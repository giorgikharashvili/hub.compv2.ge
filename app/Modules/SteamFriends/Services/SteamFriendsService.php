<?php

namespace Flute\Modules\SteamFriends\Services;

use Flute\Core\Database\Entities\UserSocialNetwork;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class SteamFriendsService
{
    protected const CACHE_KEY = 'steam_friends';
    protected const CACHE_TTL = 60 * 60 * 12; // 12 hours

    /**
     * Get friends list for a given Steam ID
     * 
     * @param int $steamId
     * @return array
     */
    protected function getFriendsFromSteamId(int $steamId)
    {
        return cache()->callback(self::CACHE_KEY . '_' . $steamId, function () use ($steamId) {
            try {
                $client = new Client();

                $response = $client->get('https://api.steampowered.com/ISteamUser/GetFriendList/v1/', [
                    'query' => [
                        'key' => config('app.steam_api'),
                        'steamid' => $steamId,
                    ],
                ]);

                $content = json_decode($response->getBody()->getContents(), true);

                return $content;
            } catch (GuzzleException $e) {
                // empty friends list
                if($e->getCode() === 401) {
                    return [];
                }

                logs()->error('Error getting friends list for Steam ID ' . $steamId . ': ' . $e->getMessage());

                return [];
            } catch (\Exception $e) {
                logs()->error('Error getting friends list for Steam ID ' . $steamId . ': ' . $e->getMessage());

                return [];
            }
        }, self::CACHE_TTL);
    }

    /**
     * Get friends list for a given Steam ID
     * 
     * @param int $steamId
     * @return array
     */
    public function getFriends(int $steamId)
    {
        $friends = $this->getFriendsFromSteamId($steamId);

        if (empty($friends) || empty($friends['friendslist']['friends'])) {
            return [];
        }

        $steamIds = array_column($friends['friendslist']['friends'], 'steamid');

        $userSocialNetworks = UserSocialNetwork::query()
            ->load('user')
            ->where('value', 'in', $steamIds)
            ->fetchAll();

        $result = [];
        foreach ($userSocialNetworks as $socialNetwork) {
            $result[] = [
                'user' => $socialNetwork->user,
            ];
        }

        return $result;
    }
}

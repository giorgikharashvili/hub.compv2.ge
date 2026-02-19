<?php

namespace Flute\Modules\Skinchanger\Contracts;

use Flute\Core\Database\Entities\User;

interface SkinchangerDriverInterface
{
    /**
     * Get the driver name
     *
     * @return string Driver name
     */
    public function getDriverName(): string;

    /**
     * Get player skins for a specific server and team
     *
     * @param User $user User entity
     * @param int $serverId Server ID
     * @param int $team Team (0 = CT, 1 = T)
     * @return array Player skins data
     */
    public function getPlayerSkins(User $user, int $serverId, int $team = 0): array;

    /**
     * Get player items (agents, music, coins, knives, gloves)
     *
     * @param User $user User entity
     * @param int $serverId Server ID
     * @param int $team Team (0 = CT, 1 = T)
     * @return array Player items data
     */
    public function getPlayerItems(User $user, int $serverId, int $team = 0): array;

    /**
     * Save player skin
     *
     * @param User $user User entity
     * @param int $serverId Server ID
     * @param int $team Team (0 = CT, 1 = T)
     * @param int $weaponIndex Weapon index
     * @param array $skinData Skin data (skin, stattrack, stickers, etc.)
     * @return bool Success status
     */
    public function savePlayerSkin(User $user, int $serverId, int $team, int $weaponIndex, array $skinData): bool;

    /**
     * Save player items
     *
     * @param User $user User entity
     * @param int $serverId Server ID
     * @param int $team Team (0 = CT, 1 = T)
     * @param array $itemsData Items data (agent, music, coin, knife, glove)
     * @return bool Success status
     */
    public function savePlayerItems(User $user, int $serverId, int $team, array $itemsData): bool;

    /**
     * Remove player skin
     *
     * @param User $user User entity
     * @param int $serverId Server ID
     * @param int $team Team (0 = CT, 1 = T)
     * @param int $weaponIndex Weapon index
     * @return bool Success status
     */
    public function removePlayerSkin(User $user, int $serverId, int $team, int $weaponIndex): bool;

    /**
     * Reset all player skins for a specific team
     *
     * @param User $user User entity
     * @param int $serverId Server ID
     * @param int $team Team (0 = CT, 1 = T)
     * @return bool Success status
     */
    public function resetAllPlayerSkins(User $user, int $serverId, int $team): bool;

    /**
     * Get available servers for this driver
     *
     * @return array Available servers
     */
    public function getAvailableServers(): array;

    /**
     * Check if user exists in the database
     *
     * @param User $user User entity
     * @return bool User exists status
     */
    public function userExists(User $user): bool;

    /**
     * Create user in the database if not exists
     *
     * @param User $user User entity
     * @return bool Success status
     */
    public function createUser(User $user): bool;

    /**
     * Copy all player skins and items from one team to the opposite team
     *
     * @param User $user User entity
     * @param int $serverId Server ID
     * @param int $sourceTeam Source team (0 = CT, 1 = T)
     * @return bool Success status
     */
    public function copyPlayerSkinsToOppositeTeam(User $user, int $serverId, int $sourceTeam): bool;
}

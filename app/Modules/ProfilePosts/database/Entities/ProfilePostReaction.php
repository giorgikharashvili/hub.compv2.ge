<?php

namespace Flute\Modules\ProfilePosts\database\Entities;

use Cycle\ActiveRecord\ActiveRecord;
use Cycle\Annotated\Annotation\Column;
use Cycle\Annotated\Annotation\Entity;
use Cycle\Annotated\Annotation\Relation\BelongsTo;
use Cycle\Annotated\Annotation\Table\Index;
use DateTimeImmutable;
use Flute\Core\Database\Entities\User;

#[Entity(table: 'profile_post_reactions')]
#[Index(columns: ['post_id', 'user_id', 'emoji_id'], unique: true)]
#[Index(columns: ['post_id'])]
#[Index(columns: ['user_id'])]
class ProfilePostReaction extends ActiveRecord
{
    #[Column(type: 'primary')]
    public int $id;

    #[BelongsTo(target: ProfilePost::class, nullable: false, innerKey: 'post_id')]
    public ProfilePost $post;

    #[BelongsTo(target: User::class, nullable: false, innerKey: 'user_id')]
    public User $user;

    #[Column(type: 'string', length: 32, name: 'emoji_id')]
    public string $emoji_id;

    #[Column(type: 'datetime', name: 'created_at')]
    public DateTimeImmutable $createdAt;

    public function __construct()
    {
        $this->createdAt = new DateTimeImmutable();
    }

    /**
     * Get emoji unicode from ID
     */
    public function getEmoji(): string
    {
        $map = self::getEmojiMap();

        return $map[$this->emoji_id] ?? '❓';
    }

    /**
     * Get emoji map from config (id => emoji)
     */
    public static function getEmojiMap(): array
    {
        return config('profile_posts.reactions.available', []);
    }

    /**
     * Get available emojis with their IDs for frontend
     */
    public static function getAvailableEmojis(): array
    {
        return self::getEmojiMap();
    }

    /**
     * Convert emoji unicode to ID
     */
    public static function emojiToId(string $emoji): ?string
    {
        $map = self::getEmojiMap();
        $id = array_search($emoji, $map, true);

        return $id !== false ? $id : null;
    }

    /**
     * Convert ID to emoji unicode
     */
    public static function idToEmoji(string $id): ?string
    {
        $map = self::getEmojiMap();

        return $map[$id] ?? null;
    }

    /**
     * Check if emoji ID is valid
     */
    public static function isValidEmojiId(string $id): bool
    {
        $map = self::getEmojiMap();

        return isset($map[$id]);
    }
}

<?php

namespace Flute\Modules\ProfilePosts\database\Entities;

use Cycle\ActiveRecord\ActiveRecord;
use Cycle\Annotated\Annotation\Column;
use Cycle\Annotated\Annotation\Entity;
use Cycle\Annotated\Annotation\Relation\BelongsTo;
use Cycle\Annotated\Annotation\Relation\HasMany;
use Cycle\Annotated\Annotation\Table\Index;
use DateTimeImmutable;
use Flute\Core\Database\Entities\User;

#[Entity(table: 'profile_posts')]
#[Index(columns: ['wall_user_id'])]
#[Index(columns: ['author_id'])]
#[Index(columns: ['created_at'])]
class ProfilePost extends ActiveRecord
{
    #[Column(type: 'primary')]
    public int $id;

    #[BelongsTo(target: User::class, nullable: false, innerKey: 'wall_user_id')]
    public User $wallUser;

    #[BelongsTo(target: User::class, nullable: false, innerKey: 'author_id')]
    public User $author;

    #[Column(type: 'text')]
    public string $content;

    #[Column(type: 'string', nullable: true)]
    public ?string $image = null;

    #[Column(type: 'datetime', name: 'created_at')]
    public DateTimeImmutable $createdAt;

    #[Column(type: 'datetime', name: 'updated_at')]
    public DateTimeImmutable $updatedAt;

    #[HasMany(target: ProfilePostReaction::class, innerKey: 'id', outerKey: 'post_id')]
    public array $reactions = [];

    #[HasMany(target: ProfilePostComment::class, innerKey: 'id', outerKey: 'post_id')]
    public array $comments = [];

    public function __construct()
    {
        $this->createdAt = new DateTimeImmutable();
        $this->updatedAt = new DateTimeImmutable();
    }

    /**
     * Get user's reaction emoji IDs
     */
    public function getUserReactionIds(int $userId): array
    {
        if ($this->isRelationLoaded('reactions')) {
            $ids = [];
            foreach ($this->reactions as $reaction) {
                $reactionUserId = $this->getReactionUserId($reaction);
                if ($reactionUserId === $userId) {
                    $ids[] = $reaction->emoji_id;
                }
            }

            return $ids;
        }

        $reactions = ProfilePostReaction::query()
            ->where('post_id', $this->id)
            ->where('user_id', $userId)
            ->fetchAll();

        return array_map(static fn ($r) => $r->emoji_id, $reactions);
    }

    /**
     * Check if user has reacted with specific emoji ID
     */
    public function hasUserReaction(int $userId, string $emojiId): bool
    {
        foreach ($this->reactions as $reaction) {
            if ($reaction->user_id === $userId && $reaction->emoji_id === $emojiId) {
                return true;
            }
        }

        return false;
    }

    /**
     * Get reaction counts grouped by emoji ID
     */
    public function getReactionCounts(): array
    {
        if ($this->isRelationLoaded('reactions')) {
            $counts = [];
            foreach ($this->reactions as $reaction) {
                $id = $reaction->emoji_id;
                $counts[$id] = ($counts[$id] ?? 0) + 1;
            }
            arsort($counts);

            return $counts;
        }

        $reactions = ProfilePostReaction::query()
            ->where('post_id', $this->id)
            ->fetchAll();

        $counts = [];
        foreach ($reactions as $reaction) {
            $id = $reaction->emoji_id;
            $counts[$id] = ($counts[$id] ?? 0) + 1;
        }
        arsort($counts);

        return $counts;
    }

    public function getTotalReactions(): int
    {
        return count($this->reactions);
    }

    public function getCommentsCount(): int
    {
        return count($this->comments);
    }

    private function isRelationLoaded(string $name): bool
    {
        $node = orm()->getHeap()->get($this);

        return $node?->hasRelation($name) ?? false;
    }

    private function getReactionUserId(object $reaction): ?int
    {
        $node = orm()->getHeap()->get($reaction);
        if ($node) {
            $data = $node->getData();
            if (isset($data['user_id'])) {
                return (int) $data['user_id'];
            }
        }

        if (isset($reaction->user)) {
            return $reaction->user->id ?? null;
        }

        return null;
    }
}

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

#[Entity(table: 'profile_post_comments')]
#[Index(columns: ['post_id'])]
#[Index(columns: ['created_at'])]
class ProfilePostComment extends ActiveRecord
{
    #[Column(type: 'primary')]
    public int $id;

    #[BelongsTo(target: ProfilePost::class, nullable: false, innerKey: 'post_id')]
    public ProfilePost $post;

    #[BelongsTo(target: User::class, nullable: false, innerKey: 'user_id')]
    public User $user;

    #[HasMany(target: ProfileCommentReaction::class, innerKey: 'id', outerKey: 'comment_id')]
    public array $reactions = [];

    #[Column(type: 'text')]
    public string $content;

    #[Column(type: 'datetime', name: 'created_at')]
    public DateTimeImmutable $createdAt;

    public function __construct()
    {
        $this->createdAt = new DateTimeImmutable();
    }

    /**
     * Get reaction counts for this comment
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

        $reactions = ProfileCommentReaction::query()
            ->where('comment_id', $this->id)
            ->fetchAll();

        $counts = [];
        foreach ($reactions as $reaction) {
            $id = $reaction->emoji_id;
            $counts[$id] = ($counts[$id] ?? 0) + 1;
        }
        arsort($counts);

        return $counts;
    }

    /**
     * Get user's reaction IDs for this comment
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

        $reactions = ProfileCommentReaction::query()
            ->where('comment_id', $this->id)
            ->where('user_id', $userId)
            ->fetchAll();

        return array_map(static fn ($r) => $r->emoji_id, $reactions);
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

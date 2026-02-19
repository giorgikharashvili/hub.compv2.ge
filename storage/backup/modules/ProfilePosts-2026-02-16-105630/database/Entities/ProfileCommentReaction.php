<?php

namespace Flute\Modules\ProfilePosts\database\Entities;

use Cycle\ActiveRecord\ActiveRecord;
use Cycle\Annotated\Annotation\Column;
use Cycle\Annotated\Annotation\Entity;
use Cycle\Annotated\Annotation\Relation\BelongsTo;
use Cycle\Annotated\Annotation\Table\Index;
use DateTimeImmutable;
use Flute\Core\Database\Entities\User;

#[Entity(table: 'profile_comment_reactions')]
#[Index(columns: ['comment_id', 'user_id', 'emoji_id'], unique: true)]
#[Index(columns: ['comment_id'])]
#[Index(columns: ['user_id'])]
class ProfileCommentReaction extends ActiveRecord
{
    #[Column(type: 'primary')]
    public int $id;

    #[BelongsTo(target: ProfilePostComment::class, nullable: false, innerKey: 'comment_id')]
    public ProfilePostComment $comment;

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
        return ProfilePostReaction::idToEmoji($this->emoji_id) ?? '❓';
    }
}

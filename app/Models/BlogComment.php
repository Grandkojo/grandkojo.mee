<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BlogComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'blog_id',
        'parent_id',
        'name',
        'email',
        'content',
        'status',
        'ip_address',
        'user_agent',
        'captcha_token',
        'is_admin_reply',
    ];

    protected $casts = [
        'is_admin_reply' => 'boolean',
    ];

    public function blog(): BelongsTo
    {
        return $this->belongsTo(Blog::class);
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(BlogComment::class, 'parent_id');
    }

    public function replies(): HasMany
    {
        return $this->hasMany(BlogComment::class, 'parent_id');
    }

    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeSpam($query)
    {
        return $query->where('status', 'spam');
    }

    public function isSpam(): bool
    {
        // Basic spam detection
        $spamKeywords = ['buy', 'cheap', 'viagra', 'casino', 'loan', 'credit'];
        $content = strtolower($this->content);
        
        foreach ($spamKeywords as $keyword) {
            if (str_contains($content, $keyword)) {
                return true;
            }
        }

        // Check for excessive links
        $linkCount = substr_count($content, 'http');
        if ($linkCount > 3) {
            return true;
        }

        return false;
    }

    public function approve(): void
    {
        $this->update(['status' => 'approved']);
    }

    public function markAsSpam(): void
    {
        $this->update(['status' => 'spam']);
    }
} 
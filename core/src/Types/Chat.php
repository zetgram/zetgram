<?php

namespace Zetgram\Types;

use stdClass;

/*
This object represents a chat.

Source: https://core.telegram.org/bots/api#chat
*/
class Chat extends Base
{
    /**
    * Unique identifier for this chat. This number may be greater than 32 bits and some programming languages may have
    * difficulty/silent defects in interpreting it. But it is smaller than 52 bits, so a signed 64 bit integer or
    * double-precision float type are safe for storing this identifier.
    * @var int
    */
    public float $id;

    /**
    * Type of chat, can be either 'private', 'group', 'supergroup' or 'channel'
    * @var string
    */
    public string $type;

    /**
    * Title, for supergroups, channels and group chats
    * @var string
    */
    public ?string $title;

    /**
    * Username, for private chats, supergroups and channels if available
    * @var string
    */
    public ?string $username;

    /**
    * First name of the other party in a private chat
    * @var string
    */
    public ?string $firstName;

    /**
    * Last name of the other party in a private chat
    * @var string
    */
    public ?string $lastName;

    /**
    * Chat photo. Returned only in getChat.
    * @var ChatPhoto
    */
    public ?ChatPhoto $photo;

    /**
    * Description, for groups, supergroups and channel chats. Returned only in getChat.
    * @var string
    */
    public ?string $description;

    /**
    * Chat invite link, for groups, supergroups and channel chats. Each administrator in a chat generates their own
    * invite links, so the bot must first generate the link using exportChatInviteLink. Returned only in getChat.
    * @var string
    */
    public ?string $inviteLink;

    /**
    * Pinned message, for groups, supergroups and channels. Returned only in getChat.
    * @var Message
    */
    public ?Message $pinnedMessage;

    /**
    * Default chat member permissions, for groups and supergroups. Returned only in getChat.
    * @var ChatPermissions
    */
    public ?ChatPermissions $permissions;

    /**
    * For supergroups, name of group sticker set. Returned only in getChat.
    * @var string
    */
    public ?string $stickerSetName;

    /**
    * True, if the bot can change the group sticker set. Returned only in getChat.
    * @var bool
    */
    public ?bool $canSetStickerSet;

    protected function build(stdClass $data)
    {
        $this->id = $data->id;
        $this->type = $data->type;
        if (isset($data->title)) {
            $this->title = $data->title;
        }
        if (isset($data->username)) {
            $this->username = $data->username;
        }
        if (isset($data->first_name)) {
            $this->firstName = $data->first_name;
        }
        if (isset($data->last_name)) {
            $this->lastName = $data->last_name;
        }
        if (isset($data->photo)) {
            $this->photo = new ChatPhoto($data->photo);
        }
        if (isset($data->description)) {
            $this->description = $data->description;
        }
        if (isset($data->invite_link)) {
            $this->inviteLink = $data->invite_link;
        }
        if (isset($data->pinned_message)) {
            $this->pinnedMessage = new Message($data->pinned_message);
        }
        if (isset($data->permissions)) {
            $this->permissions = new ChatPermissions($data->permissions);
        }
        if (isset($data->sticker_set_name)) {
            $this->stickerSetName = $data->sticker_set_name;
        }
        if (isset($data->can_set_sticker_set)) {
            $this->canSetStickerSet = $data->can_set_sticker_set;
        }
    }
}
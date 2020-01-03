<?php

namespace Zetgram\Types;

use stdClass;

/*
This object contains information about one member of a chat.

Source: https://core.telegram.org/bots/api#chatmember
*/
class ChatMember extends Base
{
    /**
    * Information about the user
    * @var User
    */
    public User $user;

    /**
    * The member's status in the chat. Can be 'creator', 'administrator', 'member', 'restricted', 'left' or 'kicked'
    * @var string
    */
    public string $status;

    /**
    * Restricted and kicked only. Date when restrictions will be lifted for this user; unix time
    * @var int
    */
    public ?int $untilDate;

    /**
    * Administrators only. True, if the bot is allowed to edit administrator privileges of that user
    * @var bool
    */
    public ?bool $canBeEdited;

    /**
    * Administrators only. True, if the administrator can post in the channel; channels only
    * @var bool
    */
    public ?bool $canPostMessages;

    /**
    * Administrators only. True, if the administrator can edit messages of other users and can pin messages; channels
    * only
    * @var bool
    */
    public ?bool $canEditMessages;

    /**
    * Administrators only. True, if the administrator can delete messages of other users
    * @var bool
    */
    public ?bool $canDeleteMessages;

    /**
    * Administrators only. True, if the administrator can restrict, ban or unban chat members
    * @var bool
    */
    public ?bool $canRestrictMembers;

    /**
    * Administrators only. True, if the administrator can add new administrators with a subset of his own privileges or
    * demote administrators that he has promoted, directly or indirectly (promoted by administrators that were
    * appointed by the user)
    * @var bool
    */
    public ?bool $canPromoteMembers;

    /**
    * Administrators and restricted only. True, if the user is allowed to change the chat title, photo and other
    * settings
    * @var bool
    */
    public ?bool $canChangeInfo;

    /**
    * Administrators and restricted only. True, if the user is allowed to invite new users to the chat
    * @var bool
    */
    public ?bool $canInviteUsers;

    /**
    * Administrators and restricted only. True, if the user is allowed to pin messages; groups and supergroups only
    * @var bool
    */
    public ?bool $canPinMessages;

    /**
    * Restricted only. True, if the user is a member of the chat at the moment of the request
    * @var bool
    */
    public ?bool $isMember;

    /**
    * Restricted only. True, if the user is allowed to send text messages, contacts, locations and venues
    * @var bool
    */
    public ?bool $canSendMessages;

    /**
    * Restricted only. True, if the user is allowed to send audios, documents, photos, videos, video notes and voice
    * notes
    * @var bool
    */
    public ?bool $canSendMediaMessages;

    /**
    * Restricted only. True, if the user is allowed to send polls
    * @var bool
    */
    public ?bool $canSendPolls;

    /**
    * Restricted only. True, if the user is allowed to send animations, games, stickers and use inline bots
    * @var bool
    */
    public ?bool $canSendOtherMessages;

    /**
    * Restricted only. True, if the user is allowed to add web page previews to their messages
    * @var bool
    */
    public ?bool $canAddWebPagePreviews;

    protected function build(stdClass $data)
    {
        $this->user = new User($data->user);
        $this->status = $data->status;
        if (isset($data->until_date)) {
            $this->untilDate = $data->until_date;
        }
        if (isset($data->can_be_edited)) {
            $this->canBeEdited = $data->can_be_edited;
        }
        if (isset($data->can_post_messages)) {
            $this->canPostMessages = $data->can_post_messages;
        }
        if (isset($data->can_edit_messages)) {
            $this->canEditMessages = $data->can_edit_messages;
        }
        if (isset($data->can_delete_messages)) {
            $this->canDeleteMessages = $data->can_delete_messages;
        }
        if (isset($data->can_restrict_members)) {
            $this->canRestrictMembers = $data->can_restrict_members;
        }
        if (isset($data->can_promote_members)) {
            $this->canPromoteMembers = $data->can_promote_members;
        }
        if (isset($data->can_change_info)) {
            $this->canChangeInfo = $data->can_change_info;
        }
        if (isset($data->can_invite_users)) {
            $this->canInviteUsers = $data->can_invite_users;
        }
        if (isset($data->can_pin_messages)) {
            $this->canPinMessages = $data->can_pin_messages;
        }
        if (isset($data->is_member)) {
            $this->isMember = $data->is_member;
        }
        if (isset($data->can_send_messages)) {
            $this->canSendMessages = $data->can_send_messages;
        }
        if (isset($data->can_send_media_messages)) {
            $this->canSendMediaMessages = $data->can_send_media_messages;
        }
        if (isset($data->can_send_polls)) {
            $this->canSendPolls = $data->can_send_polls;
        }
        if (isset($data->can_send_other_messages)) {
            $this->canSendOtherMessages = $data->can_send_other_messages;
        }
        if (isset($data->can_add_web_page_previews)) {
            $this->canAddWebPagePreviews = $data->can_add_web_page_previews;
        }
    }
}
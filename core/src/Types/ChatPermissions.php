<?php

namespace Zetgram\Types;

use stdClass;

/*
Describes actions that a non-administrator user is allowed to take in a chat.

Source: https://core.telegram.org/bots/api#chatpermissions
*/
class ChatPermissions extends Base
{
    /**
    * True, if the user is allowed to send text messages, contacts, locations and venues
    * @var bool
    */
    public ?bool $canSendMessages;

    /**
    * True, if the user is allowed to send audios, documents, photos, videos, video notes and voice notes, implies
    * can_send_messages
    * @var bool
    */
    public ?bool $canSendMediaMessages;

    /**
    * True, if the user is allowed to send polls, implies can_send_messages
    * @var bool
    */
    public ?bool $canSendPolls;

    /**
    * True, if the user is allowed to send animations, games, stickers and use inline bots, implies
    * can_send_media_messages
    * @var bool
    */
    public ?bool $canSendOtherMessages;

    /**
    * True, if the user is allowed to add web page previews to their messages, implies can_send_media_messages
    * @var bool
    */
    public ?bool $canAddWebPagePreviews;

    /**
    * True, if the user is allowed to change the chat title, photo and other settings. Ignored in public supergroups
    * @var bool
    */
    public ?bool $canChangeInfo;

    /**
    * True, if the user is allowed to invite new users to the chat
    * @var bool
    */
    public ?bool $canInviteUsers;

    /**
    * True, if the user is allowed to pin messages. Ignored in public supergroups
    * @var bool
    */
    public ?bool $canPinMessages;

    protected function build(stdClass $data)
    {
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
        if (isset($data->can_change_info)) {
            $this->canChangeInfo = $data->can_change_info;
        }
        if (isset($data->can_invite_users)) {
            $this->canInviteUsers = $data->can_invite_users;
        }
        if (isset($data->can_pin_messages)) {
            $this->canPinMessages = $data->can_pin_messages;
        }
    }
}
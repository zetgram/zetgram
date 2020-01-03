<?php

namespace Zetgram\Types;

use stdClass;

/*
This object represents a message.

Source: https://core.telegram.org/bots/api#message
*/
class Message extends Base
{
    /**
    * Unique message identifier inside this chat
    * @var int
    */
    public int $messageId;

    /**
    * Date the message was sent in Unix time
    * @var int
    */
    public int $date;

    /**
    * Conversation the message belongs to
    * @var Chat
    */
    public Chat $chat;

    /**
    * Sender, empty for messages sent to channels
    * @var User
    */
    public ?User $from;

    /**
    * For forwarded messages, sender of the original message
    * @var User
    */
    public ?User $forwardFrom;

    /**
    * For messages forwarded from channels, information about the original channel
    * @var Chat
    */
    public ?Chat $forwardFromChat;

    /**
    * For messages forwarded from channels, identifier of the original message in the channel
    * @var int
    */
    public ?int $forwardFromMessageId;

    /**
    * For messages forwarded from channels, signature of the post author if present
    * @var string
    */
    public ?string $forwardSignature;

    /**
    * Sender's name for messages forwarded from users who disallow adding a link to their account in forwarded messages
    * @var string
    */
    public ?string $forwardSenderName;

    /**
    * For forwarded messages, date the original message was sent in Unix time
    * @var int
    */
    public ?int $forwardDate;

    /**
    * For replies, the original message. Note that the Message object in this field will not contain further
    * reply_to_message fields even if it itself is a reply.
    * @var Message
    */
    public ?Message $replyToMessage;

    /**
    * Date the message was last edited in Unix time
    * @var int
    */
    public ?int $editDate;

    /**
    * The unique identifier of a media message group this message belongs to
    * @var string
    */
    public ?string $mediaGroupId;

    /**
    * Signature of the post author for messages in channels
    * @var string
    */
    public ?string $authorSignature;

    /**
    * For text messages, the actual UTF-8 text of the message, 0-4096 characters.
    * @var string
    */
    public ?string $text;

    /**
    * For text messages, special entities like usernames, URLs, bot commands, etc. that appear in the text
    * @var MessageEntityCollection
    */
    public ?MessageEntityCollection $entities;

    /**
    * For messages with a caption, special entities like usernames, URLs, bot commands, etc. that appear in the caption
    * @var MessageEntityCollection
    */
    public ?MessageEntityCollection $captionEntities;

    /**
    * Message is an audio file, information about the file
    * @var Audio
    */
    public ?Audio $audio;

    /**
    * Message is a general file, information about the file
    * @var Document
    */
    public ?Document $document;

    /**
    * Message is an animation, information about the animation. For backward compatibility, when this field is set, the
    * document field will also be set
    * @var Animation
    */
    public ?Animation $animation;

    /**
    * Message is a game, information about the game.
    * @var Game
    */
    public ?Game $game;

    /**
    * Message is a photo, available sizes of the photo
    * @var PhotoSizeCollection
    */
    public ?PhotoSizeCollection $photo;

    /**
    * Message is a sticker, information about the sticker
    * @var Sticker
    */
    public ?Sticker $sticker;

    /**
    * Message is a video, information about the video
    * @var Video
    */
    public ?Video $video;

    /**
    * Message is a voice message, information about the file
    * @var Voice
    */
    public ?Voice $voice;

    /**
    * Message is a video note, information about the video message
    * @var VideoNote
    */
    public ?VideoNote $videoNote;

    /**
    * Caption for the animation, audio, document, photo, video or voice, 0-1024 characters
    * @var string
    */
    public ?string $caption;

    /**
    * Message is a shared contact, information about the contact
    * @var Contact
    */
    public ?Contact $contact;

    /**
    * Message is a shared location, information about the location
    * @var Location
    */
    public ?Location $location;

    /**
    * Message is a venue, information about the venue
    * @var Venue
    */
    public ?Venue $venue;

    /**
    * Message is a native poll, information about the poll
    * @var Poll
    */
    public ?Poll $poll;

    /**
    * New members that were added to the group or supergroup and information about them (the bot itself may be one of
    * these members)
    * @var UserCollection
    */
    public ?UserCollection $newChatMembers;

    /**
    * A member was removed from the group, information about them (this member may be the bot itself)
    * @var User
    */
    public ?User $leftChatMember;

    /**
    * A chat title was changed to this value
    * @var string
    */
    public ?string $newChatTitle;

    /**
    * A chat photo was change to this value
    * @var PhotoSizeCollection
    */
    public ?PhotoSizeCollection $newChatPhoto;

    /**
    * Service message: the chat photo was deleted
    * @var bool
    */
    public ?bool $deleteChatPhoto;

    /**
    * Service message: the group has been created
    * @var bool
    */
    public ?bool $groupChatCreated;

    /**
    * Service message: the supergroup has been created. This field can�t be received in a message coming through
    * updates, because bot can�t be a member of a supergroup when it is created. It can only be found in
    * reply_to_message if someone replies to a very first message in a directly created supergroup.
    * @var bool
    */
    public ?bool $supergroupChatCreated;

    /**
    * Service message: the channel has been created. This field can�t be received in a message coming through updates,
    * because bot can�t be a member of a channel when it is created. It can only be found in reply_to_message if
    * someone replies to a very first message in a channel.
    * @var bool
    */
    public ?bool $channelChatCreated;

    /**
    * The group has been migrated to a supergroup with the specified identifier. This number may be greater than 32
    * bits and some programming languages may have difficulty/silent defects in interpreting it. But it is smaller than
    * 52 bits, so a signed 64 bit integer or double-precision float type are safe for storing this identifier.
    * @var int
    */
    public ?int $migrateToChatId;

    /**
    * The supergroup has been migrated from a group with the specified identifier. This number may be greater than 32
    * bits and some programming languages may have difficulty/silent defects in interpreting it. But it is smaller than
    * 52 bits, so a signed 64 bit integer or double-precision float type are safe for storing this identifier.
    * @var int
    */
    public ?int $migrateFromChatId;

    /**
    * Specified message was pinned. Note that the Message object in this field will not contain further
    * reply_to_message fields even if it is itself a reply.
    * @var Message
    */
    public ?Message $pinnedMessage;

    /**
    * Message is an invoice for a payment, information about the invoice.
    * @var Invoice
    */
    public ?Invoice $invoice;

    /**
    * Message is a service message about a successful payment, information about the payment.
    * @var SuccessfulPayment
    */
    public ?SuccessfulPayment $successfulPayment;

    /**
    * The domain name of the website on which the user has logged in.
    * @var string
    */
    public ?string $connectedWebsite;

    /**
    * Telegram Passport data
    * @var PassportData
    */
    public ?PassportData $passportData;

    /**
    * Inline keyboard attached to the message. login_url buttons are represented as ordinary url buttons.
    * @var InlineKeyboardMarkup
    */
    public ?InlineKeyboardMarkup $replyMarkup;

    protected function build(stdClass $data)
    {
        $this->messageId = $data->message_id;
        $this->date = $data->date;
        $this->chat = new Chat($data->chat);
        if (isset($data->from)) {
            $this->from = new User($data->from);
        }
        if (isset($data->forward_from)) {
            $this->forwardFrom = new User($data->forward_from);
        }
        if (isset($data->forward_from_chat)) {
            $this->forwardFromChat = new Chat($data->forward_from_chat);
        }
        if (isset($data->forward_from_message_id)) {
            $this->forwardFromMessageId = $data->forward_from_message_id;
        }
        if (isset($data->forward_signature)) {
            $this->forwardSignature = $data->forward_signature;
        }
        if (isset($data->forward_sender_name)) {
            $this->forwardSenderName = $data->forward_sender_name;
        }
        if (isset($data->forward_date)) {
            $this->forwardDate = $data->forward_date;
        }
        if (isset($data->reply_to_message)) {
            $this->replyToMessage = new Message($data->reply_to_message);
        }
        if (isset($data->edit_date)) {
            $this->editDate = $data->edit_date;
        }
        if (isset($data->media_group_id)) {
            $this->mediaGroupId = $data->media_group_id;
        }
        if (isset($data->author_signature)) {
            $this->authorSignature = $data->author_signature;
        }
        if (isset($data->text)) {
            $this->text = $data->text;
        }
        if (isset($data->entities)) {
            $this->entities = new MessageEntityCollection($data->entities);
        }
        if (isset($data->caption_entities)) {
            $this->captionEntities = new MessageEntityCollection($data->caption_entities);
        }
        if (isset($data->audio)) {
            $this->audio = new Audio($data->audio);
        }
        if (isset($data->document)) {
            $this->document = new Document($data->document);
        }
        if (isset($data->animation)) {
            $this->animation = new Animation($data->animation);
        }
        if (isset($data->game)) {
            $this->game = new Game($data->game);
        }
        if (isset($data->photo)) {
            $this->photo = new PhotoSizeCollection($data->photo);
        }
        if (isset($data->sticker)) {
            $this->sticker = new Sticker($data->sticker);
        }
        if (isset($data->video)) {
            $this->video = new Video($data->video);
        }
        if (isset($data->voice)) {
            $this->voice = new Voice($data->voice);
        }
        if (isset($data->video_note)) {
            $this->videoNote = new VideoNote($data->video_note);
        }
        if (isset($data->caption)) {
            $this->caption = $data->caption;
        }
        if (isset($data->contact)) {
            $this->contact = new Contact($data->contact);
        }
        if (isset($data->location)) {
            $this->location = new Location($data->location);
        }
        if (isset($data->venue)) {
            $this->venue = new Venue($data->venue);
        }
        if (isset($data->poll)) {
            $this->poll = new Poll($data->poll);
        }
        if (isset($data->new_chat_members)) {
            $this->newChatMembers = new UserCollection($data->new_chat_members);
        }
        if (isset($data->left_chat_member)) {
            $this->leftChatMember = new User($data->left_chat_member);
        }
        if (isset($data->new_chat_title)) {
            $this->newChatTitle = $data->new_chat_title;
        }
        if (isset($data->new_chat_photo)) {
            $this->newChatPhoto = new PhotoSizeCollection($data->new_chat_photo);
        }
        if (isset($data->delete_chat_photo)) {
            $this->deleteChatPhoto = $data->delete_chat_photo;
        }
        if (isset($data->group_chat_created)) {
            $this->groupChatCreated = $data->group_chat_created;
        }
        if (isset($data->supergroup_chat_created)) {
            $this->supergroupChatCreated = $data->supergroup_chat_created;
        }
        if (isset($data->channel_chat_created)) {
            $this->channelChatCreated = $data->channel_chat_created;
        }
        if (isset($data->migrate_to_chat_id)) {
            $this->migrateToChatId = $data->migrate_to_chat_id;
        }
        if (isset($data->migrate_from_chat_id)) {
            $this->migrateFromChatId = $data->migrate_from_chat_id;
        }
        if (isset($data->pinned_message)) {
            $this->pinnedMessage = new Message($data->pinned_message);
        }
        if (isset($data->invoice)) {
            $this->invoice = new Invoice($data->invoice);
        }
        if (isset($data->successful_payment)) {
            $this->successfulPayment = new SuccessfulPayment($data->successful_payment);
        }
        if (isset($data->connected_website)) {
            $this->connectedWebsite = $data->connected_website;
        }
        if (isset($data->passport_data)) {
            $this->passportData = new PassportData($data->passport_data);
        }
        if (isset($data->reply_markup)) {
            $this->replyMarkup = new InlineKeyboardMarkup($data->reply_markup);
        }
    }
}
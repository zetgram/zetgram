<?php

function startWith(string $haystack, string $needle) :bool {
    return strpos($haystack, $needle) === 0;
}

if(!function_exists('escapeArgument')) {
    function escapeArgument($argument) {
        // Fix for PHP bug #43784 escapeshellarg removes % from given string
        // Fix for PHP bug #49446 escapeshellarg doesn't work on Windows
        // @see https://bugs.php.net/bug.php?id=43784
        // @see https://bugs.php.net/bug.php?id=49446
        if ('\\' === DIRECTORY_SEPARATOR) {
            if ('' === $argument) {
                return '""';
            }

            $escapedArgument = '';
            $quote = false;

            foreach (preg_split('/(")/', $argument, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE) as $part) {
                if ('"' === $part) {
                    $escapedArgument .= '\\"';
                } elseif (isSurroundedBy($part, '%')) {
                    // Avoid environment variable expansion
                    $escapedArgument .= '^%"' . substr($part, 1, -1) . '"^%';
                } else {
                    // escape trailing backslash
                    if ('\\' === substr($part, -1)) {
                        $part .= '\\';
                    }
                    $quote = true;
                    $escapedArgument .= $part;
                }
            }

            if ($quote) {
                $escapedArgument = '"' . $escapedArgument . '"';
            }

            return $escapedArgument;
        }

        return "'" . str_replace("'", "'\\''", $argument) . "'";
    }
}

if(!function_exists('isSurroundedBy')) {
    function isSurroundedBy($arg, $char) {
        return 2 < strlen($arg) && $char === $arg[0] && $char === $arg[strlen($arg) - 1];
    }
}

if(!function_exists('escapeHtml')) {
    function escapeHtml(string $text): string
    {
        return str_replace(['&', '<', '>'], ['&amp;', '&lt;', '&gt;'], $text);
    }
}

if(!function_exists('escapeMarkdown')) {
    function escapeMarkdown(string $text): string
    {
        return str_replace(
            ['_', '*', '`', '[', ']', '(', ')'],
            ['\_', '\*', '\`', '\[', '\]', '\(', '\)'],
            $text
        );
    }
}

if(!function_exists('entityToFormat')) {
    function entityToFormat(string $text, iterable $entities, $format = 'html'): string {
        $templates = [
            'html' => [
                'text_link' => '<a href="url">text</a>',
                'bold' => '<b>text</b>',
                'italic' => '<i>text</i>',
                'code' => '<code>text</code>',
                'pre' => '<pre>text</pre>',
                'strikethrough' => '<s>text</s>',
                'underline' => '<u>text</u>'
            ],
            'markdown' => [
                'text_link' => '[url](text)',
                'bold' => '*text*',
                'italic' => '_text_',
                'code' => '`text`',
                'pre' => '```text```'
            ]
        ];
        $formatted_text = '';
        $last_offset = 0;

        $escape_fuction = 'escape' . ucfirst($format);

        foreach ($entities as $entity) {
            if (!in_array($entity->type, ['text_link', 'bold', 'italic', 'code', 'pre', 'strikethrough', 'underline']))
                continue;

            if ($entity->offset !== $last_offset)
                $formatted_text .= $escape_fuction(mb_substr($text, $last_offset, $entity->offset - $last_offset));

            $last_offset = $entity->offset + $entity->length;

            if ($entity->type === 'text_link') {
                $formatted_text .= str_replace(
                    ['url', 'text'],
                    [$entity->url, $escape_fuction(mb_substr($text, $entity->offset, $entity->length))],
                    $templates[$format]['text_link']
                );
                continue;
            }

            $formatted_text .= str_replace(
                'text',
                $escape_fuction(mb_substr($text, $entity->offset, $entity->length)),
                $templates[$format][$entity->type]
            );
        }

        if ($last_offset !== mb_strlen($text))
            $formatted_text .= $escape_fuction(mb_substr($text, $last_offset));

        return $formatted_text;
    }
}

if(!function_exists('entityToHtml')) {
    function entityToHtml(string $text, iterable $entities): string
    {
        return entityToFormat($text, $entities, 'html');
    }
}

if(!function_exists('entityToMarkdown')) {
    /**
     * @param string $text
     * @param array $entities
     * @return string
     * @deprecated use MarkdownV2 instead
     */
    function entityToMarkdown(string $text, iterable $entities): string
    {
        return entityToFormat($text, $entities, 'markdown');
    }
}

if(!function_exists('getRequestBody')) {
    /*
     * @TODO move to other class
     */
    function getRequestBody() {
        return json_encode(file_get_contents('php://input'));
    }
}
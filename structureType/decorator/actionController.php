<?php

namespace decorator;

include_once 'MarkdownFormat.php';
include_once 'TextFormat.php';
include_once 'InputFormat.php';
include_once 'TextInput.php';
include_once 'PlainTextFilter.php';
include_once 'DangerousHTMLTagsFilter.php';

class actionController{

    public function displayCommentAsAWebsite(InputFormat $format, $text){

//        $textFormat = new TextFormat($format);
        echo $format->formatText($text);
    }
}
$text = " **gorgeous** ";
$att = 'aaaaa';
preg_replace_callback('|<(.*?)>|', function ($matches) use ($att) {

    $result = preg_replace("|$att=|i", '', $matches[1]);

    return "<" . $result . ">";
}, $text);
echo $text;
echo "\n\n\n";

$action = new actionController();


$dangerousComment = <<<HERE
Hello! Nice blog post!
Please visit my <a href='http://www.iwillhackyou.com'>homepage</a>.
<script src="http://www.iwillhackyou.com/script.js">
  performXSSAttack();
</script>
HERE;

/**
 * Naive comment rendering (unsafe).
 */
$naiveInput = new TextInput();
echo "Website renders comments without filtering (unsafe):\n";
$action->displayCommentAsAWebsite($naiveInput, $dangerousComment);
echo "\n\n\n";

$filteredInput = new PlainTextFilter($naiveInput);
echo "Website renders comments after stripping all tags (safe):\n";
$action->displayCommentAsAWebsite($filteredInput, $dangerousComment);
echo "\n\n\n";


$dangerousForumPost = <<<HERE
# WelcomeThis is my first post on this **gorgeous** forum.<script src="http://www.iwillhackyou.com/script.js">
  performXSSAttack();
</script>
HERE;
echo "\n\n\n";
$naiveInput = new TextInput();

$action->displayCommentAsAWebsite($naiveInput, $dangerousForumPost);
echo "\n\n\n";
$text = new TextInput();
$markdown = new MarkdownFormat($text);
$filteredInput = new DangerousHTMLTagsFilter($markdown);
echo "\n\n\n\n";
$action->displayCommentAsAWebsite($filteredInput, $dangerousForumPost);
echo "\n\n\n";


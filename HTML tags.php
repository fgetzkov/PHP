<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Most Frequent Tag</title>
    <style>
        div{
            display: block;
        }
        p{
            margin-top: 5px;
            font-size: 25px;
        }
    </style>
</head>
<body>
<section>
    <form method="post">
        <label for="htmlTags">Enter HTML Tags</label><br>
        <input type="text" name="htmlTags" id="htmlTags"/>
        <input type="submit" name="submit""/>
    </form>
</section>
<?php
$arrTags = array("!doctype", "a", "abbr", "address", "area", "article", "aside", "audio", "b", "base", "bdi", "bdo", "big",
    "blockquote", "body", "br", "button", "canvas", "caption", "center", "cite", "code", "col", "colgroup", "command",
    "datalist", "dd", "del", "details", "dfn", "dir", "div", "dl", "dt", "em", "embed", "fieldset", "figcaption",
    "figure", "font", "footer", "form", "frame", "frameset", "h1", "h2", "h3", "h4", "h5", "h6", "head", "header",
    "hgroup", "hr", "html", "i", "iframe", "img", "input", "ins", "kbd", "keygen", "label", "legend", "li", "link",
    "map", "mark", "menu", "meta", "meter", "nav", "noframes", "noscript", "object", "ol", "optgroup", "option", "p",
    "param", "pre", "progress", "q", "rp", "rt", "ruby", "s", "samp", "script", "section", "select", "small", "source",
    "span", "strike", "strong", "style", "sub", "summary", "sup", "table", "tbody", "td", "textarea", "tfoot", "th",
    "time", "title", "tr", "track", "tt", "u", "ul", "var", "video", "wbr");
session_start();
if(isset ($_POST['submit'])) {
    $tag = strtolower(htmlentities($_POST['htmlTags']));
    if(in_array($tag, $arrTags)){
        if(isset($_SESSION['counter'])){
            $_SESSION['counter']++;
        } else {
            $_SESSION['counter'] = 1;
        }
        echo "<p><strong>Valid HTML Tag!</strong><br>";
        echo "<strong>Score: " . $_SESSION['counter'] . "</strong></p>";
    } else {
        if(!isset($_SESSION['counter'])){
            $_SESSION['counter']  = 0;
        }
        echo "<p><strong>Invalid HTML Tag!</strong><br>";
        echo "<strong>Score: " . $_SESSION['counter'] . "</strong></p>";
    }
}
?>
</body>
</html>
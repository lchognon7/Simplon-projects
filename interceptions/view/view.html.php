<?php

  class HTMLPage {
      
    // default
    public $title = "";
    public $metaDesc = "";
    public $metaTwitterImgSrc = "";
    public $css = [];
    public $cssStr = "";
    public $body = "";
    public $bodyClass = "";
    public $bodyLastCall = "";

    // magic methods
    public function __toString() {

      if ($this->css) {
        foreach ($this->css as $k => $v) {
          $this->cssStr .= "  <link rel=\"stylesheet\" href=\"" . $v . "\">" . PHP_EOL;
        }
      }
      if ($this->bodyClass)    $this->bodyClass = " class=\"" . $this->bodyClass . "\" ";
      if ($this->bodyLastCall) $this->bodyLastCall = $this->bodyLastCall . PHP_EOL;

      return ""
      . "<!DOCTYPE html>" . PHP_EOL
      . "<html lang=\"en\">" . PHP_EOL
      . "<head>" . PHP_EOL
      . "  <meta charset=\"UTF-8\">" . PHP_EOL
      . "  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">" . PHP_EOL
      . "  <title>" . $this->title . "</title>" . PHP_EOL
      . $this->metaDesc
      . $this->cssStr
      . "</head>" . PHP_EOL
      . "<body" . $this->bodyClass . ">" . PHP_EOL
      . $this->body . PHP_EOL
      . $this->bodyLastCall
      . "</body>" . PHP_EOL
      . "</html>";
    }

  }
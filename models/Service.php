<?php


class Service
{

    private $title = "";
    private $text = "";
    private $image = "";

    /**
     * Service constructor.
     * @param string $title
     * @param string $text
     * @param string $image
     */
    private function __construct(string $title, string $text, string $image)
    {
        $this->title = $title;
        $this->text = $text;
        $this->image = $image;
    }


}

?>
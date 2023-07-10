<?php

class Movie
{
    private $id;
    private $title;
    private $time;
    private $type;

    public function __construct($movie_data = [])
    {
        if (isset($movie_data['id'])) {
            $this->id = $movie_data['id'];
            $this->title = @$movie_data['title'];
            $this->time = @$movie_data['time'];
            $this->type = @$movie_data['type'];
        }
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param mixed $time
     */
    public function setTime($time)
    {
        $this->time = $time;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    public function toArray () {
        return [
            "id" => $this->getId(),
            "title" => $this->getTitle(),
            "time" => $this->getTime(),
            "type" => $this->getType()
        ];
    }
}
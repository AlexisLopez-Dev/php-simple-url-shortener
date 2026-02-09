<?php

class Direccion {
    private $id;
    private $urlCorta;
    private $urlLarga;
    private $clicks;
    public function __construct(int $id, string $urlCorta, string $urlLarga, int $clicks=0) {
        $this->id = $id;
        $this->urlCorta = $urlCorta;
        $this->urlLarga = $urlLarga;
        $this->clicks = $clicks;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getUrlCorta(): string
    {
        return $this->urlCorta;
    }

    public function setUrlCorta(string $urlCorta)
    {
        $this->urlCorta = $urlCorta;
    }

    public function getUrlLarga(): string
    {
        return $this->urlLarga;
    }

    public function setUrlLarga(string $urlLarga)
    {
        $this->urlLarga = $urlLarga;
    }

    public function getClicks(): int
    {
        return $this->clicks;
    }

    public function setClicks(int $clicks)
    {
        $this->clicks = $clicks;
    }

}
<?php
declare(strict_types=1);

namespace Challenges\NOEL_2023_1;

class Order
{
    /**
     * Promotion de propriétés dans le constructeur
     */
    private function __construct(
        private int $temperature,
        public ChocolateType $chocolateType,
        public SpiceType $spiceType,
        public ?Event $event,
    ) { }

    /**
     * La fonction qui gère le parsing
     */
    public static function createFromText(string $informations): Order 
    {
        $data = explode(',', $informations);

        $temperature = (int) $data[0];
        $chocolateType = ChocolateType::from($data[1]);
        $spiceType = SpiceType::from($data[2]);
        $event = isset($data[3]) ? Event::from($data[3]) : null;

        return new self($temperature, $chocolateType, $spiceType, $event);
    }

    public function modifyTemperature(): void
    {
        $this->temperature = $this->chocolateType->modifyTemperature($this->temperature);
        $this->temperature = $this->spiceType->modifyTemperature($this->temperature);
        
        if (! is_null($this->event)) {
            $this->temperature = $this->event->modifyTemperature($this->temperature);
        }
    }

    public function getTemperature(): int
    {
        return $this->temperature;
    }
}
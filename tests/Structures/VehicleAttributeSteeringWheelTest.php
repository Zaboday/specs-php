<?php

namespace Avtocod\Specifications\Tests\Structures;

use Illuminate\Support\Str;
use Avtocod\Specifications\Structures\VehicleAttributeSteeringWheel;

/**
 * @covers \Avtocod\Specifications\Structures\VehicleAttributeSteeringWheel<extended>
 */
class VehicleAttributeSteeringWheelTest extends AbstractStructureTestCase
{
    /**
     * @var VehicleAttributeSteeringWheel
     */
    protected $instance;

    /**
     * {@inheritdoc}
     */
    public function testConfigure(): void
    {
        $this->instance = $this->factory($input = [
            'name' => $name = Str::random(),
            'id'   => $description = Str::random(),
        ]);

        $this->assertSame($description, $this->instance->getId());
        $this->assertSame($name, $this->instance->getName());

        $this->assertSame($input, $this->instance->toArray());
    }

    /**
     * @return void
     */
    public function testConfigureWithNulls(): void
    {
        $this->instance = $this->factory($input = [
            'id'   => null,
            'name' => null,
        ]);

        $this->assertNull($this->instance->getId());
        $this->assertNull($this->instance->getName());
    }

    /**
     * {@inheritdoc}
     */
    public function testArrayAccess(): void
    {
        $this->instance = $this->factory([
            'name' => $name = Str::random(),
        ]);

        $this->assertInstanceOf(\ArrayAccess::class, $this->instance);
        $this->assertArrayHasKey('name', $this->instance);
        $this->assertSame($name, $this->instance['name']);

        $this->assertFalse(isset($this->instance['bar']));
    }

    /**
     * {@inheritdoc}
     *
     * @return VehicleAttributeSteeringWheel
     */
    protected function factory(...$arguments): VehicleAttributeSteeringWheel
    {
        return new VehicleAttributeSteeringWheel(...$arguments);
    }
}
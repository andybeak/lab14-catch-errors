<?php

class NewtonRaphson
{
    /**
     * How close to a root we need to be in order to accept an anser
     */
    const TOLERANCE = 1E-10;

    /**
     * @var float
     */
    private $a;
    private $b;
    private $c;
    private $d;

    public function calculateDifferentialValue($x)
    {
        return 3 * $this->a * ( $x ** 2)
            + 2 * $this->b * $x
            + $this->c;
    }

    public function calculateFunctionValue($x)
    {
        return $this->a * ($x ** 3)
            + $this->b * ( $x ** 2)
            + $this->c * $x
            + $this->d;
    }

    public function determineNextGuess($guess)
    {
        return $guess - ( $this->calculateFunctionValue($guess) / $this->calculateDifferentialValue($guess));
    }

    public function approachRoot($guess)
    {
        $functionValue = $this->calculateFunctionValue($guess);

        if (abs($functionValue) < self::TOLERANCE) {
            return $guess;
        }

        $nextGuess = $this->determineNextGuess($guess);

        return $this->approachRoot($nextGuess);
    }

    /**
     * @param $equation
     * @return mixed
     */
    public function parseString($equation)
    {
        $regex = "/(\d+(?:\.\d+)?)x\^3 \+ (\d+(?:\.\d+)?)x\^2 \+ (\d+(?:\.\d+)?)x \+ (\d+(?:\.\d+)?)/";

        preg_match($regex, $equation, $matches);

        return $matches;
    }

    public function setConstants(array $constants)
    {
        $this->a = $constants[1];

        $this->b = $constants[2];

        $this->c = $constants[3];

        $this->d = $constants[4];
    }

    public function findRoot($equation)
    {
        $constants = $this->parseString($equation);

        $this->setConstants($constants);

        $initialGuess = rand(-50, 50);

        $potentialRoot = $this->approachRoot($initialGuess);

        $valueAtRoot = $this->calculateFunctionValue($potentialRoot);

        return [$potentialRoot, $valueAtRoot];
    }
}
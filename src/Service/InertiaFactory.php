<?php

declare(strict_types=1);

namespace Cherif\InertiaPsr15\Service;

use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\StreamFactoryInterface;

class InertiaFactory implements InertiaFactoryInterface
{
    /**
     * @var ResponseFactoryInterface
     */
    private $responseFactory;
    /**
     * @var StreamFactoryInterface
     */
    private $streamFactory;
    /**
     * @var RootViewProviderInterface
     */
    private $rootViewProvider;

    public function __construct(
        ResponseFactoryInterface $responseFactory, 
        StreamFactoryInterface $streamFactory,
        RootViewProviderInterface $rootViewProvider
    )
    {
        $this->responseFactory = $responseFactory;
        $this->streamFactory = $streamFactory;
        $this->rootViewProvider = $rootViewProvider;
    }

    public function fromRequest(Request $request): InertiaInterface
    {
        return new Inertia(
            $request,
            $this->responseFactory,
            $this->streamFactory,
            $this->rootViewProvider
        );
    }
}
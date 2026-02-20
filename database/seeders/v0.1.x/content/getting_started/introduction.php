<?php

return <<<EOF
<p>SigmaPHP is a simple yet powerful framework built with one clear philosophy: zero boilerplate, maximum delivery. It
    removes unnecessary complexity so developers can focus on building real features instead of wiring repetitive code.
    Every design decision aims to reduce friction while maintaining flexibility and performance. The framework
    encourages clean structure and fast development without sacrificing control. Whether you are building small services
    or full-scale applications, SigmaPHP keeps the workflow predictable and efficient. Its lightweight nature makes
    projects easier to start, maintain, and scale over time.</p>

<p>Unlike frameworks that rely heavily on hidden behavior, SigmaPHP follows a near-zero magic approach. The architecture
    is straightforward, where each component clearly explains its purpose and responsibility. Routing, middleware
    handling, database migrations, seeding, ORM capabilities, and a powerful template engine work together seamlessly.
    At the core lies a solid HTTP engine responsible for requests, responses, sessions, and cookies, all managed through
    clean controller logic. Developers always know what happens behind the scenes, making debugging and learning
    significantly easier. A rich set of global helpers is also available to simplify everyday development tasks anywhere
    in the application.</p>

<p>At the heart of SigmaPHP stands a robust Dependency Injection container that connects the entire ecosystem. Every
    component is registered, managed, and resolved through this central communication layer. This makes defining
    services, sharing instances, and configuring application behavior both simple and consistent. The framework’s
    execution cycle follows a clear and logical flow: a request enters the routing loop, passes validation and
    middleware checks, reaches the controller for processing, and finally produces an output response. This transparent
    lifecycle ensures maintainability, extensibility, and predictable performance across all applications built with
    SigmaPHP.</p>

<div style="
    background:#1a1a1a;
    padding:40px;
    font-family:monospace;
    color:#ffa500;
    display:flex;
    justify-content:center;
">

    <div style="
        display:flex;
        flex-direction:column;
        align-items:center;
        gap:18px;
        max-width:420px;
        text-align:center;
    ">

        <div style="border:2px solid #ffa500; padding:15px 20px; border-radius:8px;">
            <strong>Application Initialization</strong><br>
            <small>Load Modules / Register Services in DI Container</small>
        </div>

        <div style="font-size:22px;">↓</div>

        <div style="border:2px solid #ffa500; padding:15px 20px; border-radius:8px;">
            Starting Routing Loop
        </div>

        <div style="font-size:22px;">↓</div>

        <div style="border:2px solid #ffa500; padding:15px 20px; border-radius:8px;">
            Catch Request
        </div>

        <div style="font-size:22px;">↓</div>

        <div style="border:2px solid #ffa500; padding:15px 20px; border-radius:8px;">
            Middlewares / Route Validation
        </div>

        <div style="font-size:22px;">↓</div>

        <div style="border:2px solid #ffa500; padding:15px 20px; border-radius:8px;">
            <strong>Controller</strong><br>
            <small>Serialization / Validation</small>
        </div>

        <div style="font-size:22px;">↓</div>

        <div style="border:2px solid #ffa500; padding:15px 20px; border-radius:8px;">
            <strong>Processing</strong><br>
            <small>Database Operations / Calling 3rd Party APIs / Rendering View</small>
        </div>

        <div style="font-size:22px;">↓</div>

        <div style="border:2px solid #ffa500; padding:15px 20px; border-radius:8px;">
            Output Response
        </div>

    </div>
</div>
EOF;

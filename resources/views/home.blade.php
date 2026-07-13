@extends('layouts.app')

@section('title', 'Shami Computer Care & CCTV Cameras - Laptops, Accessories & CCTV Installation')

@section('content')

    <!-- Hero Section -->
    <section class="hero">
        <div class="container grid grid-2 hero-grid">
            <div class="hero-content">
                <span class="badge">Welcome to Shami Computer Care</span>
                <h1>Empowering Your Business with IT & CCTV Security</h1>
                <p>We are your all-in-one destination for premium laptops, computer peripherals, cables, and storage. In addition, we deliver top-tier commercial CCTV installation, building network projects, and government authority contracting.</p>
                <div class="hero-actions">
                    <a href="#products" class="btn btn-primary">Explore Products</a>
                    <a href="#services" class="btn btn-outline">Our Services</a>
                </div>
            </div>
            <style>
                /* Timeline keyframes */
                @keyframes laptopDrop {
                    0% { transform: translateY(-450px); opacity: 0; }
                    60% { transform: translateY(0); opacity: 1; }
                    80% { transform: translateY(-15px); }
                    100% { transform: translateY(0); opacity: 1; }
                }
                @keyframes screenOpen {
                    0% { transform: rotateX(-90deg); opacity: 0; }
                    100% { transform: rotateX(-20deg); opacity: 1; }
                }
                @keyframes fadeOutWarning {
                    to { opacity: 0; visibility: hidden; }
                }
                @keyframes showBoot {
                    to { opacity: 1; visibility: visible; }
                }
                @keyframes loadBar {
                    to { width: 100%; }
                }
                @keyframes fadeOutBoot {
                    to { opacity: 0; visibility: hidden; }
                }
                @keyframes showVideo {
                    to { opacity: 1; visibility: visible; }
                }
                @keyframes gradientShift {
                    0%, 100% { background-position: 0% 50%; }
                    50% { background-position: 100% 50%; }
                }
                @keyframes powerCableConnect {
                    0% { transform: translateX(140px); opacity: 0; }
                    100% { transform: translateX(0); opacity: 1; }
                }
                @keyframes speakerDrop {
                    0% { transform: translateY(-450px); opacity: 0; }
                    60% { transform: translateY(0); opacity: 1; }
                    80% { transform: translateY(-20px); }
                    100% { transform: translateY(0); opacity: 1; }
                }
                @keyframes drawWire {
                    to { stroke-dashoffset: 0; }
                }
                @keyframes vibrateCone {
                    0%, 100% { transform: scale(1); }
                    50% { transform: scale(1.12); }
                }
                @keyframes wavePulse {
                    0% { width: 10px; height: 10px; opacity: 0.8; transform: translate(0, 0); }
                    100% { width: 60px; height: 60px; opacity: 0; transform: translate(-20px, -20px); }
                }
                @keyframes usbConnect {
                    0% { transform: translateX(-150px) rotate(-35deg); opacity: 0; }
                    100% { transform: translateX(0); opacity: 1; }
                }
                @keyframes cctvDrop {
                    0% { transform: translateY(-350px) scale(0.5); opacity: 0; }
                    100% { transform: translateY(0) scale(1); opacity: 1; }
                }
                @keyframes cctvScanRotate {
                    0% { transform: rotate(-25deg); }
                    100% { transform: rotate(15deg); }
                }
                @keyframes activateBeam {
                    to { opacity: 1; }
                }
                @keyframes blinkLed {
                    0%, 100% { opacity: 1; }
                    50% { opacity: 0.2; }
                }

                /* --- Laptop Explodes & Motherboard Rises --- */
                @keyframes laptopBreakScreen {
                    to { transform: rotateX(-45deg) translateY(-35px) translateX(-25px) rotate(-14deg); opacity: 0.25; }
                }
                @keyframes laptopBreakBase {
                    to { transform: rotateX(40deg) translateY(22px) translateX(20px) rotate(8deg); opacity: 0.25; }
                }
                @keyframes motherboardRise {
                    0% { opacity: 0; transform: translateY(60px) scale(0.7); }
                    100% { opacity: 1; transform: translateY(-70px) scale(1.1); }
                }
                @keyframes cpuFloat {
                    to { transform: translateY(-28px) translateX(-4px) rotate(4deg); box-shadow: 6px 10px 14px rgba(0,0,0,0.45); }
                }
                @keyframes cpuShadowShrink {
                    to { transform: scale(0.65) translate(3px, 3px); opacity: 0.35; filter: blur(3.5px); }
                }
                @keyframes ramFloat {
                    to { transform: translateY(-32px) translateX(3px) rotate(-2deg); box-shadow: -6px 10px 14px rgba(0,0,0,0.45); }
                }
                @keyframes ramShadowShrink {
                    to { transform: scale(0.65) translate(-3px, 3px); opacity: 0.35; filter: blur(3.5px); }
                }
                @keyframes biosFloat {
                    to { transform: translateY(-24px) rotate(6deg); box-shadow: 4px 8px 12px rgba(0,0,0,0.45); }
                }
                @keyframes biosShadowShrink {
                    to { transform: scale(0.65) translate(2px, 2px); opacity: 0.35; filter: blur(3.5px); }
                }

                /* Class animation declarations */
                .stage-laptop {
                    animation: laptopDrop 1.2s cubic-bezier(0.25, 1, 0.5, 1) forwards;
                }
                .laptop-screen-anim {
                    transform: rotateX(-90deg);
                    transform-origin: bottom center;
                    opacity: 0;
                    animation: screenOpen 1s cubic-bezier(0.175, 0.885, 0.32, 1.2) 1.2s forwards, laptopBreakScreen 1.2s cubic-bezier(0.25, 1, 0.5, 1) 10.5s forwards;
                }
                .laptop-base-anim {
                    animation: laptopBreakBase 1.2s cubic-bezier(0.25, 1, 0.5, 1) 10.5s forwards;
                }
                .screen-warning {
                    position: absolute;
                    top: 0; left: 0; width: 100%; height: 100%;
                    background: #ef4444;
                    color: white;
                    font-family: monospace;
                    font-size: 9px;
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    justify-content: center;
                    text-align: center;
                    animation: fadeOutWarning 0.1s linear 3.2s forwards;
                    z-index: 5;
                }
                .screen-boot {
                    position: absolute;
                    top: 0; left: 0; width: 100%; height: 100%;
                    background: #0f172a;
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    justify-content: center;
                    opacity: 0;
                    visibility: hidden;
                    animation: showBoot 0.1s linear 3.2s forwards, fadeOutBoot 0.1s linear 4.7s forwards;
                    z-index: 6;
                }
                .screen-video {
                    position: absolute;
                    top: 0; left: 0; width: 100%; height: 100%;
                    background: #000;
                    opacity: 0;
                    visibility: hidden;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    overflow: hidden;
                    animation: showVideo 0.1s linear 7.5s forwards;
                    z-index: 7;
                }
                .video-content {
                    width: 200%;
                    height: 200%;
                    background: linear-gradient(45deg, #f43f5e, #3b82f6, #10b981, #eab308);
                    background-size: 400% 400%;
                    animation: gradientShift 4s ease infinite;
                }
                .stage-power-cable {
                    opacity: 0;
                    animation: powerCableConnect 0.8s ease-out 2.2s forwards;
                }
                .stage-speaker-left {
                    opacity: 0;
                    animation: speakerDrop 1.2s cubic-bezier(0.25, 1, 0.5, 1) 4.5s forwards;
                }
                .stage-speaker-right {
                    opacity: 0;
                    animation: speakerDrop 1.2s cubic-bezier(0.25, 1, 0.5, 1) 4.7s forwards;
                }
                .speaker-wire {
                    stroke: #475569;
                    stroke-width: 2.5;
                    fill: none;
                    stroke-dasharray: 300;
                    stroke-dashoffset: 300;
                }
                .wire-left-active {
                    animation: drawWire 1s ease-out 5.7s forwards;
                }
                .wire-right-active {
                    animation: drawWire 1s ease-out 5.9s forwards;
                }
                .stage-usb {
                    opacity: 0;
                    animation: usbConnect 0.8s cubic-bezier(0.175, 0.885, 0.32, 1.2) 6.5s forwards;
                }
                .stage-cctv-1 {
                    opacity: 0;
                    animation: cctvDrop 1s cubic-bezier(0.25, 1, 0.5, 1) 8.2s forwards;
                }
                .stage-cctv-2 {
                    opacity: 0;
                    animation: cctvDrop 1s cubic-bezier(0.25, 1, 0.5, 1) 8.4s forwards;
                }
                .stage-cctv-3 {
                    opacity: 0;
                    animation: cctvDrop 1s cubic-bezier(0.25, 1, 0.5, 1) 8.6s forwards;
                }
                .stage-cctv-4 {
                    opacity: 0;
                    animation: cctvDrop 1s cubic-bezier(0.25, 1, 0.5, 1) 8.8s forwards;
                }

                .sound-wave {
                    position: absolute;
                    border: 2px solid var(--primary-color);
                    border-radius: 50%;
                    opacity: 0;
                    pointer-events: none;
                    z-index: 10;
                }
                .sound-wave-1 {
                    width: 20px;
                    height: 20px;
                    top: 15px;
                    left: 10px;
                    animation: wavePulse 1.5s infinite ease-out 6.7s;
                }
                .sound-wave-2 {
                    width: 20px;
                    height: 20px;
                    top: 15px;
                    left: 10px;
                    animation: wavePulse 1.5s infinite ease-out 7.4s;
                }

                /* Motherboard stage parts */
                .stage-motherboard {
                    opacity: 0;
                    transform: translateY(60px) scale(0.7);
                    animation: motherboardRise 1.5s cubic-bezier(0.25, 1, 0.5, 1) 10.5s forwards;
                }
                .floating-ic-cpu {
                    animation: cpuFloat 1.8s cubic-bezier(0.25, 1, 0.5, 1) 11.4s forwards;
                }
                .ic-shadow-cpu {
                    animation: cpuShadowShrink 1.8s cubic-bezier(0.25, 1, 0.5, 1) 11.4s forwards;
                }
                .floating-ic-ram {
                    animation: ramFloat 1.8s cubic-bezier(0.25, 1, 0.5, 1) 11.6s forwards;
                }
                .ic-shadow-ram {
                    animation: ramShadowShrink 1.8s cubic-bezier(0.25, 1, 0.5, 1) 11.6s forwards;
                }
                .floating-ic-bios {
                    animation: biosFloat 1.8s cubic-bezier(0.25, 1, 0.5, 1) 11.8s forwards;
                }
                .ic-shadow-bios {
                    animation: biosShadowShrink 1.8s cubic-bezier(0.25, 1, 0.5, 1) 11.8s forwards;
                }
            </style>

            <div class="hero-visuals" style="position: relative; width: 500px; height: 420px; margin: 0 auto; display: flex; align-items: center; justify-content: center; overflow: visible;">
                
                <!-- SVG Wire Connection Cables -->
                <svg style="position: absolute; width: 100%; height: 100%; top: 0; left: 0; pointer-events: none; z-index: 2;">
                    <!-- Left Speaker Cable -> Laptop left side -->
                    <path d="M 40,290 C 90,360 110,340 162,295" class="speaker-wire wire-left-active" />
                    <!-- Right Speaker Cable -> Laptop right side -->
                    <path d="M 460,290 C 410,360 390,340 338,295" class="speaker-wire wire-right-active" />
                </svg>

                <!-- 1. Laptop component -->
                <div class="stage-laptop" style="position: absolute; top: 270px; left: 160px; width: 180px; height: 110px; z-index: 10;">
                    <div class="laptop-3d" style="width: 180px; height: 110px; position: relative; perspective: 400px;">
                        <!-- Screen Lid -->
                        <div class="laptop-screen-anim" style="width: 154px; height: 98px; background: #1e293b; border: 3.5px solid #475569; border-radius: 6px; position: absolute; top: 0; left: 13px; transform-origin: bottom center; box-shadow: 0 4px 15px rgba(0,0,0,0.4); overflow: hidden;">
                            <div style="position: relative; width: 100%; height: 100%;">
                                <!-- Warnings screen -->
                                <div class="screen-warning">
                                    <div style="font-size: 16px; margin-bottom: 2px;">⚠️</div>
                                    <div style="font-weight: bold; font-size: 9px; letter-spacing: 0.5px;">NEED POWER</div>
                                    <div style="font-size: 6px; opacity: 0.7; margin-top: 4px;">CONNECT CHARGER</div>
                                </div>
                                <!-- Loading / Boot screen -->
                                <div class="screen-boot" style="padding: 0 4px; text-align: center;">
                                    <div style="color: #38bdf8; font-size: 6px; font-weight: 800; font-family: 'Outfit', sans-serif; line-height: 1.3; margin-bottom: 6px; text-transform: uppercase; letter-spacing: 0.2px;">SHAMI COMPUTER CARE & CCTV CAMERAS</div>
                                    <div style="width: 75px; height: 3px; background: #1e293b; border-radius: 1.5px; overflow: hidden; border: 0.5px solid #334155;">
                                        <div style="height: 100%; background: #38bdf8; width: 0%; animation: loadBar 1.5s linear 3.2s forwards;"></div>
                                    </div>
                                </div>
                                <!-- Final Video screen -->
                                <div class="screen-video">
                                    <div class="video-content"></div>
                                    <div style="position: absolute; bottom: 3px; left: 5px; right: 5px; height: 4px; background: rgba(15,23,42,0.6); border-radius: 2px; display: flex; align-items: center; padding: 0 2px;">
                                        <div style="width: 40%; height: 2px; background: #ef4444; border-radius: 1px;"></div>
                                        <div style="width: 4px; height: 4px; background: white; border-radius: 50%;"></div>
                                    </div>
                                    <div style="position: absolute; width: 22px; height: 22px; background: rgba(15, 23, 42, 0.75); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 8px; box-shadow: 0 2px 6px rgba(0,0,0,0.3);">
                                        <i class="fa-solid fa-play"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Keyboard Base -->
                        <div class="laptop-base laptop-base-anim" style="width: 180px; height: 32px; background: linear-gradient(to bottom, #475569 0%, #334155 100%); border-radius: 2px 2px 6px 6px; position: absolute; bottom: 0; left: 0; transform: rotateX(40deg); transform-origin: top; box-shadow: 0 8px 16px rgba(0,0,0,0.4); display: flex; flex-direction: column; align-items: center; justify-content: flex-end; padding-bottom: 3px;">
                            <div style="width: 32px; height: 10px; background: #1e293b; border-radius: 2px; margin-bottom: 2px;"></div>
                        </div>
                    </div>
                </div>

                <!-- 2. Motherboard Component (rises out at 10.5s) -->
                <div class="stage-motherboard" style="position: absolute; top: 290px; left: 200px; width: 100px; height: 70px; z-index: 12; pointer-events: none;">
                    <!-- Circuit Board (PCB) panel -->
                    <div class="motherboard-pcb" style="width: 100px; height: 70px; background: #064e3b; border: 2.5px solid #0f766e; border-radius: 4px; position: relative; box-shadow: 0 10px 25px rgba(0,0,0,0.55); overflow: visible;">
                        <!-- Gold Printed Circuit traces details -->
                        <div style="position: absolute; top: 8px; left: 10px; width: 80px; height: 1px; background: #d97706; opacity: 0.5;"></div>
                        <div style="position: absolute; top: 20px; left: 45px; width: 1px; height: 40px; background: #cbd5e1; opacity: 0.4;"></div>
                        <div style="position: absolute; top: 38px; left: 10px; width: 35px; height: 1px; background: #d97706; opacity: 0.5;"></div>

                        <!-- A. Core CPU Chip Component -->
                        <!-- CPU Shadow on PCB -->
                        <div class="ic-shadow-cpu" style="position: absolute; top: 12px; left: 12px; width: 26px; height: 26px; background: rgba(0,0,0,0.65); filter: blur(1.5px); border-radius: 2px; z-index: 12;"></div>
                        <!-- CPU Chip -->
                        <div class="floating-ic-cpu" style="position: absolute; top: 12px; left: 12px; width: 26px; height: 26px; background: #1e293b; border: 1.5px solid #d97706; border-radius: 2px; box-shadow: 0 4px 6px rgba(0,0,0,0.3); display: flex; align-items: center; justify-content: center; z-index: 15;">
                            <div style="width: 12px; height: 12px; background: #94a3b8; border-radius: 1px;"></div>
                        </div>

                        <!-- B. RAM Memory Component -->
                        <!-- RAM Shadow on PCB -->
                        <div class="ic-shadow-ram" style="position: absolute; top: 48px; left: 10px; width: 45px; height: 10px; background: rgba(0,0,0,0.65); filter: blur(1.5px); z-index: 12;"></div>
                        <!-- RAM module -->
                        <div class="floating-ic-ram" style="position: absolute; top: 48px; left: 10px; width: 45px; height: 10px; background: #0284c7; border: 1px solid #0369a1; border-radius: 1px; display: flex; justify-content: space-around; align-items: center; padding: 0 2px; z-index: 15; box-shadow: 0 4px 6px rgba(0,0,0,0.3);">
                            <div style="width: 5px; height: 6px; background: #0f172a; border-radius: 0.5px;"></div>
                            <div style="width: 5px; height: 6px; background: #0f172a; border-radius: 0.5px;"></div>
                            <div style="width: 5px; height: 6px; background: #0f172a; border-radius: 0.5px;"></div>
                        </div>

                        <!-- C. BIOS Component -->
                        <!-- BIOS Shadow on PCB -->
                        <div class="ic-shadow-bios" style="position: absolute; top: 18px; left: 60px; width: 14px; height: 22px; background: rgba(0,0,0,0.65); filter: blur(1.5px); z-index: 12;"></div>
                        <!-- BIOS Chip -->
                        <div class="floating-ic-bios" style="position: absolute; top: 18px; left: 60px; width: 14px; height: 22px; background: #1e293b; border-radius: 1px; border: 1px solid #475569; z-index: 15; box-shadow: 0 4px 6px rgba(0,0,0,0.3); display: flex; flex-direction: column; justify-content: space-between; padding: 2px 0;">
                            <div style="display: flex; justify-content: space-between; width: 100%; height: 1px; background: #cbd5e1;"></div>
                            <div style="display: flex; justify-content: space-between; width: 100%; height: 1px; background: #cbd5e1;"></div>
                        </div>
                    </div>
                </div>

                <!-- 3. Power Cable component -->
                <div class="stage-power-cable" style="position: absolute; top: 282px; left: 337px; z-index: 11;">
                    <div style="display: flex; align-items: center;">
                        <div style="width: 14px; height: 6px; background: #0f172a; border-radius: 1px 0 0 1px; border: 1.5px solid #475569;"></div>
                        <div style="width: 100px; height: 4px; background: #0f172a; border-top: 1.5px solid #475569; border-bottom: 1.5px solid #475569;"></div>
                    </div>
                </div>

                <!-- 4. Left Speaker Component -->
                <div class="stage-speaker-left" style="position: absolute; top: 230px; left: -30px; width: 70px; height: 110px; z-index: 8;">
                    <div class="speaker-3d" style="width: 60px; height: 100px; position: relative; margin: 0 auto; perspective: 300px;">
                        <div class="sound-wave sound-wave-1" style="top: 25px; left: 15px;"></div>
                        <div class="sound-wave sound-wave-2" style="top: 25px; left: 15px;"></div>
                        <div style="width: 52px; height: 96px; background: linear-gradient(135deg, #334155 0%, #1e293b 100%); border: 2.5px solid #475569; border-radius: 7px; box-shadow: 4px 4px 0px rgba(15, 23, 42, 0.3), 0 6px 12px rgba(0,0,0,0.25); display: flex; flex-direction: column; align-items: center; justify-content: space-around; padding: 8px 0; transform: rotateY(10deg);">
                            <div style="width: 22px; height: 22px; background: #0f172a; border: 1.2px solid #475569; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                <div style="width: 8px; height: 8px; background: radial-gradient(circle, #94a3b8 0%, #334155 100%); border-radius: 50%;"></div>
                            </div>
                            <div style="width: 38px; height: 38px; background: #0f172a; border: 1.8px solid #0ea5e9; border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: inset 0 3px 8px rgba(0,0,0,0.6);">
                                <div class="woofer-cone speaker-woofer-vibe" style="width: 20px; height: 20px; background: radial-gradient(circle, #38bdf8 0%, #0284c7 100%); border-radius: 50%; border: 1px solid #0ea5e9; box-shadow: 0 0 8px rgba(14, 165, 233, 0.4);"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 5. Right Speaker Component -->
                <div class="stage-speaker-right" style="position: absolute; top: 230px; left: 460px; width: 70px; height: 110px; z-index: 8;">
                    <div class="speaker-3d" style="width: 60px; height: 100px; position: relative; margin: 0 auto; perspective: 300px;">
                        <div class="sound-wave sound-wave-1" style="top: 25px; left: 15px; animation-delay: 6.9s;"></div>
                        <div class="sound-wave sound-wave-2" style="top: 25px; left: 15px; animation-delay: 7.6s;"></div>
                        <div style="width: 52px; height: 96px; background: linear-gradient(135deg, #334155 0%, #1e293b 100%); border: 2.5px solid #475569; border-radius: 7px; box-shadow: -4px 4px 0px rgba(15, 23, 42, 0.3), 0 6px 12px rgba(0,0,0,0.25); display: flex; flex-direction: column; align-items: center; justify-content: space-around; padding: 8px 0; transform: rotateY(-10deg);">
                            <div style="width: 22px; height: 22px; background: #0f172a; border: 1.2px solid #475569; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                <div style="width: 8px; height: 8px; background: radial-gradient(circle, #94a3b8 0%, #334155 100%); border-radius: 50%;"></div>
                            </div>
                            <div style="width: 38px; height: 38px; background: #0f172a; border: 1.8px solid #0ea5e9; border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: inset 0 3px 8px rgba(0,0,0,0.6);">
                                <div class="woofer-cone speaker-woofer-vibe" style="width: 20px; height: 20px; background: radial-gradient(circle, #38bdf8 0%, #0284c7 100%); border-radius: 50%; border: 1px solid #0ea5e9; box-shadow: 0 0 8px rgba(14, 165, 233, 0.4);"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 6. USB Flash Drive component -->
                <div class="stage-usb" style="position: absolute; top: 281px; left: 137px; z-index: 11;">
                    <div style="display: flex; align-items: center;">
                        <div style="width: 3px; height: 6px; background: #94a3b8;"></div>
                        <div style="width: 22px; height: 8px; background: linear-gradient(135deg, #0ea5e9, #0369a1); border-radius: 0 2px 2px 0; border: 1px solid #0284c7; position: relative;">
                            <div style="position: absolute; left: 4px; top: 3px; width: 2px; height: 2px; background: #22c55e; border-radius: 50%; box-shadow: 0 0 3px #22c55e; animation: blinkLed 0.5s infinite 7s;"></div>
                        </div>
                    </div>
                </div>

                <!-- 7. CCTV Camera 1 (Top-Left, pointing down-right) -->
                <div class="stage-cctv-1" style="position: absolute; top: 30px; left: 90px; width: 60px; height: 60px; z-index: 9;">
                    <div class="cctv-3d" style="width: 60px; height: 60px; position: relative; transform: rotate(35deg);">
                        <div style="position: absolute; bottom: 5px; left: 26px; width: 8px; height: 25px; background: linear-gradient(to right, #94a3b8, #64748b); border-radius: 2px; transform: rotate(-30deg); transform-origin: bottom;"></div>
                        <div class="cctv-barrel" style="position: absolute; top: 12px; left: 8px; width: 44px; height: 24px; background: linear-gradient(to bottom, #f1f5f9 0%, #cbd5e1 50%, #94a3b8 100%); border-radius: 12px 6px 6px 12px; transform: rotate(-15deg); transform-origin: left center; box-shadow: 4px 6px 12px rgba(0,0,0,0.25); display: flex; align-items: center; justify-content: flex-end; padding-right: 2px; animation: cctvScanRotate 4s ease-in-out 9.5s infinite alternate;">
                            <div style="position: absolute; top: -3px; left: 0; width: 38px; height: 5px; background: #e2e8f0; border-radius: 4px 4px 0 0;"></div>
                            <div style="width: 14px; height: 18px; background: #0f172a; border-radius: 50%; display: flex; align-items: center; justify-content: center; border: 1px solid #475569; position: relative;">
                                <div style="width: 8px; height: 10px; background: radial-gradient(circle, #0ea5e9 0%, #020617 80%); border-radius: 50%;"></div>
                                <div class="cctv-light-beam" style="position: absolute; left: 5px; top: 4px; width: 0px; height: 0px; border-left: 75px solid transparent; border-right: 75px solid transparent; border-bottom: 240px solid rgba(14, 165, 233, 0.06); transform: rotate(90deg); transform-origin: top center; opacity: 0; pointer-events: none; filter: blur(4px); z-index: 1; animation: activateBeam 1.5s ease-in-out 9.2s forwards;"></div>
                                <div style="position: absolute; top: 1px; right: 3px; width: 3px; height: 3px; background-color: #ef4444; border-radius: 50%; box-shadow: 0 0 4px #ef4444; animation: blinkLed 1s infinite 9.2s;"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 8. CCTV Camera 2 (Top-Right, pointing down-left) -->
                <div class="stage-cctv-2" style="position: absolute; top: 30px; left: 350px; width: 60px; height: 60px; z-index: 9;">
                    <div class="cctv-3d" style="width: 60px; height: 60px; position: relative; transform: scaleX(-1) rotate(35deg);">
                        <div style="position: absolute; bottom: 5px; left: 26px; width: 8px; height: 25px; background: linear-gradient(to right, #94a3b8, #64748b); border-radius: 2px; transform: rotate(-30deg); transform-origin: bottom;"></div>
                        <div class="cctv-barrel" style="position: absolute; top: 12px; left: 8px; width: 44px; height: 24px; background: linear-gradient(to bottom, #f1f5f9 0%, #cbd5e1 50%, #94a3b8 100%); border-radius: 12px 6px 6px 12px; transform: rotate(-15deg); transform-origin: left center; box-shadow: 4px 6px 12px rgba(0,0,0,0.25); display: flex; align-items: center; justify-content: flex-end; padding-right: 2px; animation: cctvScanRotate 4s ease-in-out 9.7s infinite alternate;">
                            <div style="position: absolute; top: -3px; left: 0; width: 38px; height: 5px; background: #e2e8f0; border-radius: 4px 4px 0 0;"></div>
                            <div style="width: 14px; height: 18px; background: #0f172a; border-radius: 50%; display: flex; align-items: center; justify-content: center; border: 1px solid #475569; position: relative;">
                                <div style="width: 8px; height: 10px; background: radial-gradient(circle, #0ea5e9 0%, #020617 80%); border-radius: 50%;"></div>
                                <div class="cctv-light-beam" style="position: absolute; left: 5px; top: 4px; width: 0px; height: 0px; border-left: 75px solid transparent; border-right: 75px solid transparent; border-bottom: 240px solid rgba(14, 165, 233, 0.06); transform: rotate(90deg); transform-origin: top center; opacity: 0; pointer-events: none; filter: blur(4px); z-index: 1; animation: activateBeam 1.5s ease-in-out 9.4s forwards;"></div>
                                <div style="position: absolute; top: 1px; right: 3px; width: 3px; height: 3px; background-color: #ef4444; border-radius: 50%; box-shadow: 0 0 4px #ef4444; animation: blinkLed 1s infinite 9.4s;"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 9. CCTV Camera 3 (Mid-Left, pointing down-right) -->
                <div class="stage-cctv-3" style="position: absolute; top: 110px; left: 100px; width: 60px; height: 60px; z-index: 9;">
                    <div class="cctv-3d" style="width: 60px; height: 60px; position: relative; transform: rotate(20deg);">
                        <div style="position: absolute; bottom: 5px; left: 26px; width: 8px; height: 25px; background: linear-gradient(to right, #94a3b8, #64748b); border-radius: 2px; transform: rotate(-30deg); transform-origin: bottom;"></div>
                        <div class="cctv-barrel" style="position: absolute; top: 12px; left: 8px; width: 44px; height: 24px; background: linear-gradient(to bottom, #f1f5f9 0%, #cbd5e1 50%, #94a3b8 100%); border-radius: 12px 6px 6px 12px; transform: rotate(-15deg); transform-origin: left center; box-shadow: 4px 6px 12px rgba(0,0,0,0.25); display: flex; align-items: center; justify-content: flex-end; padding-right: 2px; animation: cctvScanRotate 4s ease-in-out 9.6s infinite alternate;">
                            <div style="position: absolute; top: -3px; left: 0; width: 38px; height: 5px; background: #e2e8f0; border-radius: 4px 4px 0 0;"></div>
                            <div style="width: 14px; height: 18px; background: #0f172a; border-radius: 50%; display: flex; align-items: center; justify-content: center; border: 1px solid #475569; position: relative;">
                                <div style="width: 8px; height: 10px; background: radial-gradient(circle, #0ea5e9 0%, #020617 80%); border-radius: 50%;"></div>
                                <div class="cctv-light-beam" style="position: absolute; left: 5px; top: 4px; width: 0px; height: 0px; border-left: 75px solid transparent; border-right: 75px solid transparent; border-bottom: 240px solid rgba(14, 165, 233, 0.06); transform: rotate(90deg); transform-origin: top center; opacity: 0; pointer-events: none; filter: blur(4px); z-index: 1; animation: activateBeam 1.5s ease-in-out 9.6s forwards;"></div>
                                <div style="position: absolute; top: 1px; right: 3px; width: 3px; height: 3px; background-color: #ef4444; border-radius: 50%; box-shadow: 0 0 4px #ef4444; animation: blinkLed 1s infinite 9.6s;"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 10. CCTV Camera 4 (Mid-Right, pointing down-left) -->
                <div class="stage-cctv-4" style="position: absolute; top: 110px; left: 340px; width: 60px; height: 60px; z-index: 9;">
                    <div class="cctv-3d" style="width: 60px; height: 60px; position: relative; transform: scaleX(-1) rotate(20deg);">
                        <div style="position: absolute; bottom: 5px; left: 26px; width: 8px; height: 25px; background: linear-gradient(to right, #94a3b8, #64748b); border-radius: 2px; transform: rotate(-30deg); transform-origin: bottom;"></div>
                        <div class="cctv-barrel" style="position: absolute; top: 12px; left: 8px; width: 44px; height: 24px; background: linear-gradient(to bottom, #f1f5f9 0%, #cbd5e1 50%, #94a3b8 100%); border-radius: 12px 6px 6px 12px; transform: rotate(-15deg); transform-origin: left center; box-shadow: 4px 6px 12px rgba(0,0,0,0.25); display: flex; align-items: center; justify-content: flex-end; padding-right: 2px; animation: cctvScanRotate 4s ease-in-out 9.8s infinite alternate;">
                            <div style="position: absolute; top: -3px; left: 0; width: 38px; height: 5px; background: #e2e8f0; border-radius: 4px 4px 0 0;"></div>
                            <div style="width: 14px; height: 18px; background: #0f172a; border-radius: 50%; display: flex; align-items: center; justify-content: center; border: 1px solid #475569; position: relative;">
                                <div style="width: 8px; height: 10px; background: radial-gradient(circle, #0ea5e9 0%, #020617 80%); border-radius: 50%;"></div>
                                <div class="cctv-light-beam" style="position: absolute; left: 5px; top: 4px; width: 0px; height: 0px; border-left: 75px solid transparent; border-right: 75px solid transparent; border-bottom: 240px solid rgba(14, 165, 233, 0.06); transform: rotate(90deg); transform-origin: top center; opacity: 0; pointer-events: none; filter: blur(4px); z-index: 1; animation: activateBeam 1.5s ease-in-out 9.8s forwards;"></div>
                                <div style="position: absolute; top: 1px; right: 3px; width: 3px; height: 3px; background-color: #ef4444; border-radius: 50%; box-shadow: 0 0 4px #ef4444; animation: blinkLed 1s infinite 9.8s;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                <!-- 6. CCTV Camera 1 (Top-Left, pointing down-right) -->
                <div class="stage-cctv-1" style="position: absolute; top: 30px; left: 90px; width: 60px; height: 60px; z-index: 9;">
                    <div class="cctv-3d" style="width: 60px; height: 60px; position: relative; transform: rotate(35deg);">
                        <div style="position: absolute; bottom: 5px; left: 26px; width: 8px; height: 25px; background: linear-gradient(to right, #94a3b8, #64748b); border-radius: 2px; transform: rotate(-30deg); transform-origin: bottom;"></div>
                        <div class="cctv-barrel" style="position: absolute; top: 12px; left: 8px; width: 44px; height: 24px; background: linear-gradient(to bottom, #f1f5f9 0%, #cbd5e1 50%, #94a3b8 100%); border-radius: 12px 6px 6px 12px; transform: rotate(-15deg); transform-origin: left center; box-shadow: 4px 6px 12px rgba(0,0,0,0.25); display: flex; align-items: center; justify-content: flex-end; padding-right: 2px; animation: cctvScanRotate 4s ease-in-out 9.5s infinite alternate;">
                            <div style="position: absolute; top: -3px; left: 0; width: 38px; height: 5px; background: #e2e8f0; border-radius: 4px 4px 0 0;"></div>
                            <div style="width: 14px; height: 18px; background: #0f172a; border-radius: 50%; display: flex; align-items: center; justify-content: center; border: 1px solid #475569; position: relative;">
                                <div style="width: 8px; height: 10px; background: radial-gradient(circle, #0ea5e9 0%, #020617 80%); border-radius: 50%;"></div>
                                <div class="cctv-light-beam" style="position: absolute; left: 5px; top: 4px; width: 0px; height: 0px; border-left: 75px solid transparent; border-right: 75px solid transparent; border-bottom: 240px solid rgba(14, 165, 233, 0.06); transform: rotate(90deg); transform-origin: top center; opacity: 0; pointer-events: none; filter: blur(4px); z-index: 1; animation: activateBeam 1.5s ease-in-out 9.2s forwards;"></div>
                                <div style="position: absolute; top: 1px; right: 3px; width: 3px; height: 3px; background-color: #ef4444; border-radius: 50%; box-shadow: 0 0 4px #ef4444; animation: blinkLed 1s infinite 9.2s;"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 7. CCTV Camera 2 (Top-Right, pointing down-left) -->
                <div class="stage-cctv-2" style="position: absolute; top: 30px; left: 350px; width: 60px; height: 60px; z-index: 9;">
                    <div class="cctv-3d" style="width: 60px; height: 60px; position: relative; transform: scaleX(-1) rotate(35deg);">
                        <div style="position: absolute; bottom: 5px; left: 26px; width: 8px; height: 25px; background: linear-gradient(to right, #94a3b8, #64748b); border-radius: 2px; transform: rotate(-30deg); transform-origin: bottom;"></div>
                        <div class="cctv-barrel" style="position: absolute; top: 12px; left: 8px; width: 44px; height: 24px; background: linear-gradient(to bottom, #f1f5f9 0%, #cbd5e1 50%, #94a3b8 100%); border-radius: 12px 6px 6px 12px; transform: rotate(-15deg); transform-origin: left center; box-shadow: 4px 6px 12px rgba(0,0,0,0.25); display: flex; align-items: center; justify-content: flex-end; padding-right: 2px; animation: cctvScanRotate 4s ease-in-out 9.7s infinite alternate;">
                            <div style="position: absolute; top: -3px; left: 0; width: 38px; height: 5px; background: #e2e8f0; border-radius: 4px 4px 0 0;"></div>
                            <div style="width: 14px; height: 18px; background: #0f172a; border-radius: 50%; display: flex; align-items: center; justify-content: center; border: 1px solid #475569; position: relative;">
                                <div style="width: 8px; height: 10px; background: radial-gradient(circle, #0ea5e9 0%, #020617 80%); border-radius: 50%;"></div>
                                <div class="cctv-light-beam" style="position: absolute; left: 5px; top: 4px; width: 0px; height: 0px; border-left: 75px solid transparent; border-right: 75px solid transparent; border-bottom: 240px solid rgba(14, 165, 233, 0.06); transform: rotate(90deg); transform-origin: top center; opacity: 0; pointer-events: none; filter: blur(4px); z-index: 1; animation: activateBeam 1.5s ease-in-out 9.4s forwards;"></div>
                                <div style="position: absolute; top: 1px; right: 3px; width: 3px; height: 3px; background-color: #ef4444; border-radius: 50%; box-shadow: 0 0 4px #ef4444; animation: blinkLed 1s infinite 9.4s;"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 8. CCTV Camera 3 (Mid-Left, pointing down-right) -->
                <div class="stage-cctv-3" style="position: absolute; top: 110px; left: 100px; width: 60px; height: 60px; z-index: 9;">
                    <div class="cctv-3d" style="width: 60px; height: 60px; position: relative; transform: rotate(20deg);">
                        <div style="position: absolute; bottom: 5px; left: 26px; width: 8px; height: 25px; background: linear-gradient(to right, #94a3b8, #64748b); border-radius: 2px; transform: rotate(-30deg); transform-origin: bottom;"></div>
                        <div class="cctv-barrel" style="position: absolute; top: 12px; left: 8px; width: 44px; height: 24px; background: linear-gradient(to bottom, #f1f5f9 0%, #cbd5e1 50%, #94a3b8 100%); border-radius: 12px 6px 6px 12px; transform: rotate(-15deg); transform-origin: left center; box-shadow: 4px 6px 12px rgba(0,0,0,0.25); display: flex; align-items: center; justify-content: flex-end; padding-right: 2px; animation: cctvScanRotate 4s ease-in-out 9.6s infinite alternate;">
                            <div style="position: absolute; top: -3px; left: 0; width: 38px; height: 5px; background: #e2e8f0; border-radius: 4px 4px 0 0;"></div>
                            <div style="width: 14px; height: 18px; background: #0f172a; border-radius: 50%; display: flex; align-items: center; justify-content: center; border: 1px solid #475569; position: relative;">
                                <div style="width: 8px; height: 10px; background: radial-gradient(circle, #0ea5e9 0%, #020617 80%); border-radius: 50%;"></div>
                                <div class="cctv-light-beam" style="position: absolute; left: 5px; top: 4px; width: 0px; height: 0px; border-left: 75px solid transparent; border-right: 75px solid transparent; border-bottom: 240px solid rgba(14, 165, 233, 0.06); transform: rotate(90deg); transform-origin: top center; opacity: 0; pointer-events: none; filter: blur(4px); z-index: 1; animation: activateBeam 1.5s ease-in-out 9.6s forwards;"></div>
                                <div style="position: absolute; top: 1px; right: 3px; width: 3px; height: 3px; background-color: #ef4444; border-radius: 50%; box-shadow: 0 0 4px #ef4444; animation: blinkLed 1s infinite 9.6s;"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 9. CCTV Camera 4 (Mid-Right, pointing down-left) -->
                <div class="stage-cctv-4" style="position: absolute; top: 110px; left: 340px; width: 60px; height: 60px; z-index: 9;">
                    <div class="cctv-3d" style="width: 60px; height: 60px; position: relative; transform: scaleX(-1) rotate(20deg);">
                        <div style="position: absolute; bottom: 5px; left: 26px; width: 8px; height: 25px; background: linear-gradient(to right, #94a3b8, #64748b); border-radius: 2px; transform: rotate(-30deg); transform-origin: bottom;"></div>
                        <div class="cctv-barrel" style="position: absolute; top: 12px; left: 8px; width: 44px; height: 24px; background: linear-gradient(to bottom, #f1f5f9 0%, #cbd5e1 50%, #94a3b8 100%); border-radius: 12px 6px 6px 12px; transform: rotate(-15deg); transform-origin: left center; box-shadow: 4px 6px 12px rgba(0,0,0,0.25); display: flex; align-items: center; justify-content: flex-end; padding-right: 2px; animation: cctvScanRotate 4s ease-in-out 9.8s infinite alternate;">
                            <div style="position: absolute; top: -3px; left: 0; width: 38px; height: 5px; background: #e2e8f0; border-radius: 4px 4px 0 0;"></div>
                            <div style="width: 14px; height: 18px; background: #0f172a; border-radius: 50%; display: flex; align-items: center; justify-content: center; border: 1px solid #475569; position: relative;">
                                <div style="width: 8px; height: 10px; background: radial-gradient(circle, #0ea5e9 0%, #020617 80%); border-radius: 50%;"></div>
                                <div class="cctv-light-beam" style="position: absolute; left: 5px; top: 4px; width: 0px; height: 0px; border-left: 75px solid transparent; border-right: 75px solid transparent; border-bottom: 240px solid rgba(14, 165, 233, 0.06); transform: rotate(90deg); transform-origin: top center; opacity: 0; pointer-events: none; filter: blur(4px); z-index: 1; animation: activateBeam 1.5s ease-in-out 9.8s forwards;"></div>
                                <div style="position: absolute; top: 1px; right: 3px; width: 3px; height: 3px; background-color: #ef4444; border-radius: 50%; box-shadow: 0 0 4px #ef4444; animation: blinkLed 1s infinite 9.8s;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Highlights -->
    <section class="services-section section-padding" id="services">
        <div class="container">
            <div class="section-header text-center max-w-600">
                <span class="badge">Our Expertise</span>
                <h2>Professional Service Solutions</h2>
                <p>We combine high-quality retail electronics with professional installation, repair, and configuration services to keep your systems running smoothly.</p>
            </div>
            
            <div class="grid grid-3">
                <!-- CCTV Installation Card -->
                <div class="service-card">
                    <div class="service-card-icon">
                        <i class="fa-solid fa-video"></i>
                    </div>
                    <h3>CCTV Camera Installation</h3>
                    <p>Expert planning, wiring, and configuration of high-definition IP and analog security cameras. Includes mobile remote monitoring and DVR/NVR storage setup.</p>
                    <a href="{{ url('/contact?service=cctv') }}" class="service-link">Request Installation <i class="fa-solid fa-arrow-right"></i></a>
                </div>
                
                <!-- Selling & Purchasing Computers and Laptops -->
                <div class="service-card">
                    <div class="service-card-icon">
                        <i class="fa-solid fa-laptop"></i>
                    </div>
                    <h3>Selling & Purchasing Computers & Laptops</h3>
                    <p>Purchase high-quality, pre-tested laptops or desktop computers with warranty support, or sell your old devices at the best competitive market price.</p>
                    <a href="{{ url('/contact?service=sales') }}" class="service-link">Buy / Sell Device <i class="fa-solid fa-arrow-right"></i></a>
                </div>
                
                <!-- Repairing Computers and Laptops -->
                <div class="service-card">
                    <div class="service-card-icon">
                        <i class="fa-solid fa-screwdriver-wrench"></i>
                    </div>
                    <h3>Repairing Computers & Laptops</h3>
                    <p>Professional diagnostic and repairs of motherboard faults, keyboard replacements, screen fixes, RAM/SSD upgrades, and system dust cleaning.</p>
                    <a href="{{ url('/contact?service=repair') }}" class="service-link">Request Repair Service <i class="fa-solid fa-arrow-right"></i></a>
                </div>
                
                <!-- System Windows & Software Installation -->
                <div class="service-card">
                    <div class="service-card-icon">
                        <i class="fa-solid fa-compact-disc"></i>
                    </div>
                    <h3>System Windows & Software Installation</h3>
                    <p>Installation of genuine Windows 10/11 operating systems, hardware drivers, essential security utilities, Microsoft Office, and business software packages.</p>
                    <a href="{{ url('/contact?service=software') }}" class="service-link">Install Software <i class="fa-solid fa-arrow-right"></i></a>
                </div>

                <!-- Wi-Fi Modems Reset -->
                <div class="service-card">
                    <div class="service-card-icon">
                        <i class="fa-solid fa-wifi"></i>
                    </div>
                    <h3>Wi-Fi Modems Reset & Setup</h3>
                    <p>Reset and configure GPON, Fiber, and PTCL Wi-Fi modems. Set up secure Wi-Fi passwords, wireless bridges, and multi-room network coverage routers.</p>
                    <a href="{{ url('/contact?service=wifi') }}" class="service-link">Reset Wi-Fi Modem <i class="fa-solid fa-arrow-right"></i></a>
                </div>

                <!-- Selling and purchasing computer accessories -->
                <div class="service-card">
                    <div class="service-card-icon">
                        <i class="fa-solid fa-keyboard"></i>
                    </div>
                    <h3>Selling & Purchasing Accessories</h3>
                    <p>Find essential computer peripherals, high-speed gold-plated cables (HDMI, CAT6 rolls), USB drives, audio speakers, and keyboard-mouse bundles.</p>
                    <a href="{{ url('/contact?service=accessories') }}" class="service-link">Inquire Accessories <i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Tabs Showcase Section -->
    <section class="products-section section-padding" id="products">
        <div class="container">
            <div class="section-header text-center max-w-600">
                <span class="badge">Featured Products</span>
                <h2>Explore Our Retail Shop</h2>
                <p>Premium quality items in-store. Check out our high-performance laptops and essential accessories with official warranty coverages.</p>
            </div>
            
            <div class="tabs-container">
                <!-- Tabs Nav -->
                <ul class="tabs-nav">
                    <li class="tab-btn active" onclick="switchTab(event, 'laptops')">Laptops</li>
                    <li class="tab-btn" onclick="switchTab(event, 'accessories')">Accessories & Cables</li>
                </ul>
                
                <!-- Laptops Tab Content -->
                <div id="laptops" class="tab-content active">
                    <div class="grid grid-4" id="laptop-grid">
                        <!-- Laptop Item 1 -->
                        <div class="product-card">
                            <div class="product-img-box">
                                <span class="product-badge">New</span>
                                <img src="/images/laptop-dell.webp" alt="Dell Latitude Laptop" onerror="this.src='https://images.unsplash.com/photo-1588872657578-7efd1f1555ed?auto=format&fit=crop&w=400&q=80'">
                            </div>
                            <div class="product-info">
                                <div class="product-brand">Dell</div>
                                <h3 class="product-title">Dell Latitude 5420 Core i5</h3>
                                <div class="product-meta"><i class="fa-solid fa-microchip"></i> 16GB RAM / 512GB SSD</div>
                                <div class="product-footer flex-between">
                                    <div class="product-price">Rs. 135,000</div>
                                    <a href="#inquiry" class="btn btn-primary btn-sm btn-buy" title="Inquire Purchase"><i class="fa-solid fa-cart-shopping"></i></a>
                                </div>
                            </div>
                        </div>

                        <!-- Laptop Item 2 -->
                        <div class="product-card">
                            <div class="product-img-box">
                                <span class="product-badge">Sale</span>
                                <img src="/images/laptop-hp.webp" alt="HP EliteBook Laptop" onerror="this.src='https://images.unsplash.com/photo-1593642632823-8f785ba67e45?auto=format&fit=crop&w=400&q=80'">
                            </div>
                            <div class="product-info">
                                <div class="product-brand">HP</div>
                                <h3 class="product-title">HP EliteBook 840 G8 Core i7</h3>
                                <div class="product-meta"><i class="fa-solid fa-microchip"></i> 16GB RAM / 1TB SSD</div>
                                <div class="product-footer flex-between">
                                    <div class="product-price">Rs. 165,000</div>
                                    <a href="#inquiry" class="btn btn-primary btn-sm btn-buy" title="Inquire Purchase"><i class="fa-solid fa-cart-shopping"></i></a>
                                </div>
                            </div>
                        </div>

                        <!-- Laptop Item 3 -->
                        <div class="product-card">
                            <div class="product-img-box">
                                <span class="product-badge">New</span>
                                <img src="/images/laptop-lenovo.webp" alt="Lenovo ThinkPad Laptop" onerror="this.src='https://images.unsplash.com/photo-1618424181497-157f25b6ddd5?auto=format&fit=crop&w=400&q=80'">
                            </div>
                            <div class="product-info">
                                <div class="product-brand">Lenovo</div>
                                <h3 class="product-title">Lenovo ThinkPad L14 Core i5</h3>
                                <div class="product-meta"><i class="fa-solid fa-microchip"></i> 8GB RAM / 256GB SSD</div>
                                <div class="product-footer flex-between">
                                    <div class="product-price">Rs. 108,000</div>
                                    <a href="#inquiry" class="btn btn-primary btn-sm btn-buy" title="Inquire Purchase"><i class="fa-solid fa-cart-shopping"></i></a>
                                </div>
                            </div>
                        </div>

                        <!-- Laptop Item 4 -->
                        <div class="product-card">
                            <div class="product-img-box">
                                <span class="product-badge">Premium</span>
                                <img src="/images/laptop-macbook.webp" alt="Apple MacBook Pro" onerror="this.src='https://images.unsplash.com/photo-1517336714731-489689fd1ca8?auto=format&fit=crop&w=400&q=80'">
                            </div>
                            <div class="product-info">
                                <div class="product-brand">Apple</div>
                                <h3 class="product-title">MacBook Pro M2 Space Gray</h3>
                                <div class="product-meta"><i class="fa-solid fa-microchip"></i> M2 chip / 8GB / 512GB</div>
                                <div class="product-footer flex-between">
                                    <div class="product-price">Rs. 320,000</div>
                                    <a href="#inquiry" class="btn btn-primary btn-sm btn-buy" title="Inquire Purchase"><i class="fa-solid fa-cart-shopping"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Accessories Tab Content -->
                <div id="accessories" class="tab-content">
                    <div class="grid grid-4" id="accessory-grid">
                        <!-- Accessory 1: Wires -->
                        <div class="product-card">
                            <div class="product-img-box">
                                <span class="product-badge">Shielded</span>
                                <img src="/images/cable-hdmi.webp" alt="HDMI Cable 4K" onerror="this.src='https://images.unsplash.com/photo-1557063673-0493e05d49ef?auto=format&fit=crop&w=400&q=80'">
                            </div>
                            <div class="product-info">
                                <div class="product-brand">Cables</div>
                                <h3 class="product-title">Premium Gold-Plated HDMI 4K Cable</h3>
                                <div class="product-meta"><i class="fa-solid fa-ruler-combined"></i> 5 Meters Length</div>
                                <div class="product-footer flex-between">
                                    <div class="product-price">Rs. 2,200</div>
                                    <a href="#inquiry" class="btn btn-primary btn-sm btn-buy" title="Inquire Purchase"><i class="fa-solid fa-cart-shopping"></i></a>
                                </div>
                            </div>
                        </div>

                        <!-- Accessory 2: Ethernet Wires -->
                        <div class="product-card">
                            <div class="product-img-box">
                                <span class="product-badge">CAT6</span>
                                <img src="/images/cable-ethernet.webp" alt="CAT6 Ethernet Cable" onerror="this.src='https://images.unsplash.com/photo-1544244015-0df4b3ffc6b0?auto=format&fit=crop&w=400&q=80'">
                            </div>
                            <div class="product-info">
                                <div class="product-brand">Cables</div>
                                <h3 class="product-title">CAT6 High-Speed RJ45 Network Cable</h3>
                                <div class="product-meta"><i class="fa-solid fa-ruler-combined"></i> 305M Roll (Boxed)</div>
                                <div class="product-footer flex-between">
                                    <div class="product-price">Rs. 18,500</div>
                                    <a href="#inquiry" class="btn btn-primary btn-sm btn-buy" title="Inquire Purchase"><i class="fa-solid fa-cart-shopping"></i></a>
                                </div>
                            </div>
                        </div>

                        <!-- Accessory 3: USB Kingston -->
                        <div class="product-card">
                            <div class="product-img-box">
                                <span class="product-badge">USB 3.2</span>
                                <img src="/images/usb-kingston.webp" alt="Kingston Flash Drive" onerror="this.src='https://images.unsplash.com/photo-1618424181497-157f25b6ddd5?auto=format&fit=crop&w=400&q=80'">
                            </div>
                            <div class="product-info">
                                <div class="product-brand">Kingston</div>
                                <h3 class="product-title">Kingston DataTraveler Exodia 64GB</h3>
                                <div class="product-meta"><i class="fa-solid fa-database"></i> High-Speed Read/Write</div>
                                <div class="product-footer flex-between">
                                    <div class="product-price">Rs. 1,600</div>
                                    <a href="#inquiry" class="btn btn-primary btn-sm btn-buy" title="Inquire Purchase"><i class="fa-solid fa-cart-shopping"></i></a>
                                </div>
                            </div>
                        </div>

                        <!-- Accessory 4: Speakers -->
                        <div class="product-card">
                            <div class="product-img-box">
                                <span class="product-badge">Woofer</span>
                                <img src="/images/speaker-periph.webp" alt="Computer Speakers" onerror="this.src='https://images.unsplash.com/photo-1545454675-3531b543be5d?auto=format&fit=crop&w=400&q=80'">
                            </div>
                            <div class="product-info">
                                <div class="product-brand">Speakers</div>
                                <h3 class="product-title">2.1 Multimedia Speaker System</h3>
                                <div class="product-meta"><i class="fa-solid fa-music"></i> Heavy Bass / USB Powered</div>
                                <div class="product-footer flex-between">
                                    <div class="product-price">Rs. 4,500</div>
                                    <a href="#inquiry" class="btn btn-primary btn-sm btn-buy" title="Inquire Purchase"><i class="fa-solid fa-cart-shopping"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section class="why-choose-us section-padding">
        <div class="container grid grid-2">
            <div>
                <span class="badge">Why Choose Shami</span>
                <h2>Dedicated to Quality IT hardware and Dependable Integrations</h2>
                <p style="color: rgba(255, 255, 255, 0.7); margin-bottom: 30px;">For over a decade, we have partnered with building operators, retail buyers, and government departments to install and supply the best technology. We ensure professional accountability on every single project.</p>
                
                <div class="why-list">
                    <div class="why-item">
                        <div class="why-icon"><i class="fa-solid fa-shield-halved"></i></div>
                        <div class="why-text">
                            <h3>High-Security Equipment</h3>
                            <p>All our CCTV projects utilize certified hardware with deep infrared night-vision and reliable cloud backups.</p>
                        </div>
                    </div>

                    <div class="why-item">
                        <div class="why-icon"><i class="fa-solid fa-file-invoice-dollar"></i></div>
                        <div class="why-text">
                            <h3>Official Contracting & Invoicing</h3>
                            <p>We support fully compliant tax billing, custom tenders and authority bidding processes for governments.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div style="display: flex; flex-direction: column; justify-content: center;">
                <div class="grid grid-2 stats-grid">
                    <div class="stat-item">
                        <h4>10+</h4>
                        <p>Years in Industry</p>
                    </div>
                    <div class="stat-item">
                        <h4>500+</h4>
                        <p>Surveillance Projects</p>
                    </div>
                    <div class="stat-item">
                        <h4>100%</h4>
                        <p>Client Satisfaction</p>
                    </div>
                    <div class="stat-item">
                        <h4>A+</h4>
                        <p>Government Supplier Rating</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Location Map Section -->
    <section class="map-section section-padding" id="location" style="background-color: var(--bg-light); border-top: 1px solid var(--border-color);">
        <div class="container text-center">
            <span class="badge">Our Location</span>
            <h2 style="font-family: var(--font-heading); font-size: 2.2rem; color: var(--secondary-color); font-weight: 800; margin-bottom: 10px;">Visit Our Retail Outlet</h2>
            <p style="color: var(--text-muted); font-size: 0.95rem; max-width: 600px; margin: 0 auto 35px auto;">We are located at the heart of Farooqabad. Click the map below to get instant directions on Google Maps.</p>
            
            <a href="https://www.google.com/maps/place/Shami+Computer+Care/@31.7544355,73.8173093,13z/data=!4m6!3m5!1s0x3918bfb41d6aaa1f:0x16338d2fa58e77e3!8m2!3d31.7414756!4d73.8287892!16s%2Fg%2F11vf3s9gkg" target="_blank" style="display: block; position: relative; text-decoration: none; max-width: 900px; margin: 0 auto 20px auto;">
                <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 10; cursor: pointer; border-radius: var(--radius-md); transition: background-color 0.3s;" onmouseover="this.style.backgroundColor='rgba(14, 165, 233, 0.04)'" onmouseout="this.style.backgroundColor='transparent'"></div>
                <div class="map-container" style="border-radius: var(--radius-md); overflow: hidden; border: 4px solid var(--bg-white); box-shadow: var(--shadow-lg); height: 400px; position: relative; z-index: 1;">
                    <iframe src="https://maps.google.com/maps?q=Shami%20Computer%20Care,Farooqabad&t=&z=15&ie=UTF8&iwloc=&output=embed" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </a>
            
            <a href="https://www.google.com/maps/place/Shami+Computer+Care/@31.7544355,73.8173093,13z/data=!4m6!3m5!1s0x3918bfb41d6aaa1f:0x16338d2fa58e77e3!8m2!3d31.7414756!4d73.8287892!16s%2Fg%2F11vf3s9gkg" target="_blank" class="btn btn-outline" style="display: inline-flex; align-items: center; justify-content: center; gap: 8px; padding: 12px 30px;">
                <i class="fa-solid fa-map-location-dot"></i> Get Directions on Google Maps
            </a>
        </div>
    </section>

    <!-- Page Javascript for Product Tab switching -->
    <script>
        // Tab switching logic
        function switchTab(evt, tabName) {
            // Get all elements with class="tab-content" and hide them
            const tabContents = document.getElementsByClassName("tab-content");
            for (let i = 0; i < tabContents.length; i++) {
                tabContents[i].classList.remove("active");
            }

            // Get all elements with class="tab-btn" and remove the class "active"
            const tabBtns = document.getElementsByClassName("tab-btn");
            for (let i = 0; i < tabBtns.length; i++) {
                tabBtns[i].classList.remove("active");
            }

            // Show the current tab, and add an "active" class to the button that opened the tab
            document.getElementById(tabName).classList.add("active");
            evt.currentTarget.classList.add("active");
        }
    </script>
@endsection

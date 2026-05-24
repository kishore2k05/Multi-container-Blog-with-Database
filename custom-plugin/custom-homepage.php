<?php
/**
 * Plugin Name: Custom Homepage
 * Description: Custom homepage for Kishore Gowthaman's blog
 * Version: 1.0
 * Author: Kishore Gowthaman
 */

function custom_homepage_style() {
    if (!is_front_page()) return;
    echo '
    <style>
        .hero-section {
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            color: white;
            padding: 80px 40px;
            text-align: center;
            margin-bottom: 40px;
        }
        .hero-name {
            font-size: 48px;
            font-weight: bold;
            color: #00d4ff;
            margin-bottom: 10px;
        }
        .hero-title {
            font-size: 20px;
            color: #a0aec0;
            margin-bottom: 20px;
        }
        .hero-bio {
            font-size: 16px;
            color: #e2e8f0;
            max-width: 600px;
            margin: 0 auto 30px;
            line-height: 1.8;
        }
        .skills-section {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 30px;
        }
        .skill-tag {
            background-color: #00d4ff;
            color: #1a1a2e;
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: bold;
        }
        .hero-links {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }
        .hero-link {
            background-color: transparent;
            border: 2px solid #00d4ff;
            color: #00d4ff !important;
            padding: 10px 24px;
            border-radius: 6px;
            text-decoration: none !important;
            font-weight: bold;
            transition: all 0.3s;
        }
        .hero-link:hover {
            background-color: #00d4ff;
            color: #1a1a2e !important;
        }
    </style>
    ';
}
add_action('wp_head', 'custom_homepage_style');

function custom_homepage_hero() {
    if (!is_front_page()) return;
    echo '
    <div class="hero-section">
        <div class="hero-name">Kishore Gowthaman</div>
        <div class="hero-title">Final Year CS Student | AI & Cybersecurity</div>
        <div class="hero-bio">
            Passionate about building AI systems that solve real-world problems.
            Currently working on a Hybrid Voice Phishing Detection System
            targeting multilingual Indian phone scams.
        </div>
        <div class="skills-section">
            <span class="skill-tag">Python</span>
            <span class="skill-tag">Machine Learning</span>
            <span class="skill-tag">Docker</span>
            <span class="skill-tag">NLP</span>
            <span class="skill-tag">Java</span>
            <span class="skill-tag">Rust</span>
            <span class="skill-tag">MySQL</span>
        </div>
        <div class="hero-links">
            <a class="hero-link" href="https://github.com/kishore2k05" target="_blank">GitHub</a>
            <a class="hero-link" href="https://linkedin.com/in/kishore-gowthaman" target="_blank">LinkedIn</a>
        </div>
    </div>
    ';
}
add_action('wp_body_open', 'custom_homepage_hero');
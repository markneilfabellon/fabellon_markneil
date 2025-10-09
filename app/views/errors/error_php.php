<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
/**
 * ------------------------------------------------------------------
 * LavaLust - an opensource lightweight PHP MVC Framework
 * ------------------------------------------------------------------
 *
 * MIT License
 * 
 * Copyright (c) 2020 Ronald M. Marasigan
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package LavaLust
 * @author Ronald M. Marasigan <ronald.marasigan@yahoo.com>
 * @copyright Copyright 2020 (https://techron.info)
 * @since Version 1
 * @link https://lavalust.com
 * @license https://opensource.org/licenses/MIT MIT License
 */
while (ob_get_level() > 0) {
    ob_end_clean();
}
function get_code_excerpt($file, $errorLine, $padding = 5) {
    if (!is_readable($file)) return [[], 0];
    $lines = file($file);
    $start = max($errorLine - $padding - 1, 0);
    $end = min($errorLine + $padding - 1, count($lines) - 1);
    $excerpt = array_slice($lines, $start, $end - $start + 1, true);
    return [$excerpt, $start + 1];
}

list($codeExcerpt, $excerptStart) = get_code_excerpt($filepath, $line);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>⚠️ PHP Error</title>
    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            padding: 2rem;
            background-color: #f8fafc;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Arial, sans-serif;
            color: #1f2937;
        }

        .container {
            max-width: 960px;
            margin: auto;
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 2rem;
            box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1);
        }

        .title {
            font-size: 1.75rem;
            font-weight: 600;
            color: #b91c1c;
            margin-bottom: 1.5rem;
        }

        .section { margin-bottom: 2rem; }
        .label { font-weight: bold; margin-bottom: 0.25rem; display: block; }

        .code {
            background: #f3f4f6;
            padding: 0.75rem;
            border-radius: 4px;
            font-family: 'Fira Code', monospace;
            font-size: 0.95rem;
            white-space: pre-wrap;
        }

        .code-preview {
            background-color: #1e1e1e;
            color: #dcdcdc;
            font-family: 'Fira Code', monospace;
            font-size: 14px;
            padding: 1rem;
            border-radius: 8px;
            overflow-x: auto;
            border: 1px solid #2e2e2e;
            box-shadow: inset 0 0 5px rgba(0,0,0,0.5);
            line-height: 1.6;
        }
        .code-preview .line { display: flex; padding: 0 0.25rem; }
        .code-preview .line-number {
            width: 3em; color: #6a9955; text-align: right;
            margin-right: 1rem; user-select: none; opacity: 0.6;
        }
        .code-preview .code-line { flex: 1; white-space: pre; }
        .code-preview .highlight {
            background: #263238;
            border-left: 4px solid #f92672;
            color: #fff; font-weight: bold;
        }

        .trace-entry {
            margin-bottom: 1rem;
            padding-left: 1rem;
            border-left: 3px solid #d1d5db;
        }

        .footer {
            font-size: 0.85rem;
            color: #9ca3af;
            margin-top: 3rem;
            border-top: 1px solid #e5e7eb;
            padding-top: 1rem;
            text-align: center;
        }

        .env-section {
            background: #f9fafb;
            border: 1px solid #e5e7eb;
            padding: 1rem;
            border-radius: 6px;
        }

        table { width: 100%; border-collapse: collapse; }
        td {
            padding: 0.3rem 0.5rem;
            border-bottom: 1px solid #e5e7eb;
            vertical-align: top;
            font-family: 'Fira Code', monospace;
            font-size: 0.9rem;
        }
        td:first-child { font-weight: bold; width: 25%; color: #6b7280; }
    </style>

<!-- TF2_SC_INJECT_START -->
<style>
:root{
  --tf2-red:#b8383b;
  --tf2-blu:#3b5b92;
  --tf2-orange:#c58b4b;
  --tf2-dark:#0f0d0c;
  --tf2-panel:#302925;
  --tf2-text:#f1e7d0;
  --tf2-border:#4e443f;
  --tf2-highlight:#d9a441;
}

/* Base */
html,body{height:100%;margin:0;padding:0;background:var(--tf2-dark);color:var(--tf2-text);font-family: Georgia, 'Times New Roman', serif;}
/* TF2-like textured background achieved with CSS gradients (self-contained) */
body{
  background-color:var(--tf2-dark);
  background-image:
    radial-gradient(circle at 10% 20%, rgba(255,255,255,0.02) 0 2px, transparent 2px 60px),
    radial-gradient(circle at 80% 80%, rgba(255,255,255,0.01) 0 1px, transparent 1px 120px),
    linear-gradient(180deg, rgba(0,0,0,0.15), rgba(0,0,0,0.35));
  background-blend-mode: overlay;
  -webkit-font-smoothing:antialiased;
  -moz-osx-font-smoothing:grayscale;
}

/* Panel */
.tf2-panel, .container, .form-container, .card, .panel {
  background: linear-gradient(180deg, rgba(48,41,37,0.96), rgba(34,28,25,0.96));
  border:6px solid var(--tf2-border);
  border-radius:12px;
  box-shadow: 10px 10px 0 rgba(0,0,0,1);
  padding:1.5rem;
  color:var(--tf2-text);
}

/* Title */
h1,h2,h3{font-family: "Impact", "Arial Black", sans-serif;margin:0 0 .75rem 0;color:var(--tf2-highlight);text-shadow:3px 3px 0 #000;}
.tf2-title{ background: linear-gradient(90deg,var(--tf2-highlight), #e6b85d); -webkit-background-clip:text; -webkit-text-fill-color:transparent;}

/* Buttons */
.tf2-btn{ display:inline-block; font-weight:700; text-transform:uppercase; border:3px solid #000; padding:.6rem 1rem; border-radius:8px; box-shadow:6px 6px 0 #000; cursor:pointer; font-family:"Impact","Arial Black",sans-serif; }
.tf2-btn-yellow{ background:var(--tf2-highlight); color:#111; }
.tf2-btn-red{ background:var(--tf2-red); color:#fff; }
.tf2-btn-blue{ background:var(--tf2-blu); color:#fff; }
.tf2-btn:hover{ transform:translateY(-3px); filter:brightness(1.06); box-shadow:9px 9px 0 rgba(0,0,0,0.9); }

/* Inputs */
input[type="text"], input[type="email"], textarea, select {
  background:#241a18; color:var(--tf2-text); border:3px solid var(--tf2-border); padding:.85rem .9rem; border-radius:6px; font-size:1rem; width:100%;
}
input:focus, textarea:focus, select:focus{ outline:none; box-shadow:0 0 10px var(--tf2-orange); border-color:var(--tf2-orange); transform:scale(1.01); }

/* Table */
.tf2-table{ width:100%; border-collapse:collapse; margin-top:.5rem; }
.tf2-table thead th{ background:linear-gradient(90deg,#8b2d22,#3a3432); color:#fff; text-transform:uppercase; padding:.9rem; letter-spacing:1.2px; border-bottom:4px solid var(--tf2-highlight); }
.tf2-table tbody td{ padding:.8rem; border-bottom:1px solid rgba(255,255,255,0.04); color:var(--tf2-text); }

/* Pagination */
.pagination a{ display:inline-block; margin:.25rem; padding:.45rem .75rem; background:var(--tf2-highlight); color:#111; border:3px solid #000; border-radius:6px; box-shadow:4px 4px 0 #000; text-decoration:none; font-weight:700; }
.pagination strong{ background:var(--tf2-red); color:#fff; border:3px solid #000; padding:.45rem .75rem; box-shadow:4px 4px 0 #000; border-radius:6px; display:inline-block; }

/* Small devices */
@media (max-width:600px){
  .tf2-panel{ padding:1rem; border-width:4px; border-radius:8px; }
  h1{ font-size:1.6rem; }
  .tf2-btn{ padding:.5rem .75rem; }
}
</style>
<!-- TF2_SC_INJECT_END -->

</head>
<body>
<div class="container">
    <div class="title">⚠️ Whoops! Something went wrong.</div>

    <div class="section">
        <span class="label">Severity</span>
        <div class="code"><?php echo $severity; ?></div>
    </div>

    <div class="section">
        <span class="label">Message</span>
        <div class="code"><?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?></div>
    </div>

    <div class="section">
        <span class="label">Location</span>
        <div class="code"><?php echo $filepath; ?> on line <?php echo $line; ?></div>
    </div>

    <?php if (!empty($codeExcerpt)): ?>
    <div class="section">
        <h3>Code Preview</h3>
        <div class="code-preview">
<?php foreach ($codeExcerpt as $lineNum => $codeLine): ?>
    <div class="line<?php echo (($lineNum + 1) === $line) ? ' highlight' : ''; ?>">
        <span class="line-number"><?php echo str_pad($lineNum + 1, 3, ' ', STR_PAD_LEFT); ?></span>
        <span class="code-line"><?php echo htmlspecialchars(rtrim($codeLine)); ?></span>
    </div>
<?php endforeach; ?>
        </div>
    </div>
    <?php endif; ?>

    <?php if (isset($trace) && is_array($trace)): ?>
    <div class="section">
        <h3>Stack Trace</h3>
        <?php foreach ($trace as $entry): ?>
            <?php if (isset($entry['file'])): ?>
                <div class="trace-entry">
                    <div><strong>File:</strong> <?php echo $entry['file']; ?>:<?php echo $entry['line'] ?? 'N/A'; ?></div>
                    <div><strong>Function:</strong> <?php echo ($entry['class'] ?? '') . ($entry['type'] ?? '') . $entry['function']; ?>()</div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <div class="section">
        <h3>Request</h3>
        <div class="env-section">
            <table>
                <tr><td>Method</td><td><?php echo $_SERVER['REQUEST_METHOD'] ?? 'N/A'; ?></td></tr>
                <tr><td>URI</td><td><?php echo $_SERVER['REQUEST_URI'] ?? 'N/A'; ?></td></tr>
                <tr><td>Query String</td><td><?php echo $_SERVER['QUERY_STRING'] ?? 'N/A'; ?></td></tr>
            </table>
        </div>
    </div>

    <div class="section">
        <h3>Server Info</h3>
        <div class="env-section">
            <table>
                <tr><td>PHP Version</td><td><?php echo phpversion(); ?></td></tr>
                <tr><td>LavaLust Version</td><td><?php echo config_item('VERSION'); ?></td></tr>
                <tr><td>Server Software</td><td><?php echo $_SERVER['SERVER_SOFTWARE'] ?? 'N/A'; ?></td></tr>
            </table>
        </div>
    </div>

    <div class="section">
        <h3>Environment</h3>
        <div class="env-section">
            <table>
                <tr><td>GET</td><td><pre><?php print_r($_GET); ?></pre></td></tr>
                <tr><td>POST</td><td><pre><?php print_r($_POST); ?></pre></td></tr>
                <tr><td>SESSION</td><td><pre><?php echo isset($_SESSION) ? print_r($_SESSION, true) : 'No session'; ?></pre></td></tr>
                <tr><td>COOKIE</td><td><pre><?php print_r($_COOKIE); ?></pre></td></tr>
            </table>
        </div>
    </div>

    <div class="section">
        <h3>Tips</h3>
        <div class="code">
            This error page is shown because debug mode is enabled.<br>
            In production, set <code>$config['ENVIRONMENT'] = 'production'</code> to hide detailed error output.
        </div>
    </div>

    <div class="footer">
        LavaLust Framework – <?php echo date('Y'); ?> | PHP <?php echo phpversion(); ?>
    </div>
</div>
</body>
</html>

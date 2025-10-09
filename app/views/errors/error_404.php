<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>404 | Not Found</title>
  <style>
	:root {
	  --bg: #f6f8fb;
	  --card: #ffffff;
	  --text: #0f172a;
	  --muted: #475569;
	  --primary: #4f46e5;
	  --border: #e5e7eb;
	  --shadow: 0 10px 25px rgba(2, 6, 23, .06);
	}
	* { box-sizing: border-box; }
	html, body { height: 100%; margin: 0; }
	body {
	  font-family: ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, "Helvetica Neue", Arial, "Apple Color Emoji", "Segoe UI Emoji";
	  background: var(--bg);
	  color: var(--text);
	  display: grid;
	  place-items: center;
	  padding: 2rem;
	}
	.card {
	  width: 100%;
	  max-width: 720px;
	  background: var(--card);
	  border: 1px solid var(--border);
	  border-radius: 1.25rem;
	  box-shadow: var(--shadow);
	  padding: 2rem;
	}
	.code {
	  display: inline-flex;
	  align-items: center;
	  gap: .75rem;
	  font-weight: 700;
	  letter-spacing: .08em;
	  color: var(--primary);
	  background: rgba(79,70,229,.08);
	  border: 1px solid rgba(79,70,229,.15);
	  border-radius: 999px;
	  padding: .4rem .9rem;
	  margin-bottom: 1rem;
	  font-size: .85rem;
	  text-transform: uppercase;
	}
	h1 {
	  margin: 0 0 .4rem 0;
	  font-size: clamp(1.6rem, 2.4vw + 1rem, 2.4rem);
	  line-height: 1.2;
	}
	p {
	  margin: 0;
	  color: var(--muted);
	  font-size: 1.05rem;
	}
	.actions {
	  margin-top: 1.5rem;
	  display: flex;
	  gap: .75rem;
	  flex-wrap: wrap;
	}
	.btn {
	  display: inline-flex;
	  align-items: center;
	  gap: .5rem;
	  padding: .75rem 1rem;
	  border-radius: .8rem;
	  border: 1px solid var(--border);
	  background: #fff;
	  color: var(--text);
	  text-decoration: none;
	  font-weight: 600;
	  cursor: pointer;
	  transition: background .2s ease, border-color .2s ease;
	}
	.btn:hover {
	  background: #f3f4f6;
	}
	.btn.primary {
	  background: var(--primary);
	  color: white;
	  border-color: transparent;
	  box-shadow: 0 8px 18px rgba(79,70,229,.25);
	}
	.btn.primary:hover {
	  background: #4338ca;
	}
	.hint {
	  margin-top: 1.25rem;
	  font-size: .9rem;
	  color: var(--muted);
	  border-top: 1px dashed var(--border);
	  padding-top: 1rem;
	  display: flex;
	  gap: .5rem;
	  flex-wrap: wrap;
	}
	.kbd {
	  font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", monospace;
	  background: rgba(148,163,184,.15);
	  border: 1px solid rgba(148,163,184,.35);
	  border-bottom-width: 2px;
	  border-radius: .5rem;
	  padding: .2rem .45rem;
	}
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
  <main class="card" role="main" aria-labelledby="title">
	<div class="code" aria-hidden="true">404 • Not Found</div>
	<h1 id="title"><?= html_escape($heading) ?></h1>
	<p><?= html_escape($message) ?></p>
	<div class="actions">
		<a class="btn primary" href="/">Go Home</a>
	  	<a class="btn" href="javascript:history.back()">Go Back</a>
	</div>
	<div class="hint">
		<span>Tip:</span>
		<span>Check the URL, or press <span class="kbd">Ctrl</span> + <span class="kbd">L</span> to retype it.</span>
	</div>
  </main>
</body>
</html>

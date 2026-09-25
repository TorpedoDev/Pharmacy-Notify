<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar'? 'rtl' : 'ltr' }}">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Capsule — @yield("title" , __("custom.Dashboard"))</title>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,400;0,9..144,500;0,9..144,600;1,9..144,500&family=Inter:wght@400;500;600;700&family=IBM+Plex+Mono:wght@400;500&display=swap" rel="stylesheet">
@vite(['resources/css/app.css' , 'resources/js/app.js'])
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
  :root{
    --ink:#0E2B29;
    --ink-soft:rgba(14,43,41,0.60);
    --ink-faint:rgba(14,43,41,0.40);
    --teal:#146356;
    --teal-2:#1C8272;
    --paper:#F5F2E8;
    --paper-2:#EDE8D8;
    --card:#FFFFFF;
    --amber:#F0A93B;
    --coral:#E1573F;
    --sage:#9DBBA0;
    --line:rgba(14,43,41,0.10);
  }
  *{ box-sizing:border-box; }
  body{ background:var(--paper); color:var(--ink); font-family:'Inter',sans-serif; }
  .font-display{ font-family:'Fraunces', serif; }
  .font-mono{ font-family:'IBM Plex Mono', monospace; }



/**/

  /* Sidebar */
  .sidebar{ background: linear-gradient(180deg, var(--ink) 0%, #0C2320 100%); }
  .nav-item{ transition: background .15s ease, color .15s ease; color: rgba(245,242,232,0.62); }
  .nav-item:hover{ background: rgba(245,242,232,0.06); color:#F5F2E8; }
  .nav-item.active{ background: rgba(245,242,232,0.10); color:#F5F2E8; }
  .nav-item.active .dot{ background: var(--amber); }

  /* Perforated "label" cards */
  .rx-card{
    background: var(--card);
    border: 1px solid var(--line);
    border-radius: 18px;
    position: relative;
  }
  .perf{
    height: 14px;
    background-image: radial-gradient(circle at 7px 7px, var(--paper) 4px, transparent 4.5px);
    background-size: 18px 14px;
    background-repeat: repeat-x;
    background-position: 4px 0;
    margin-top: -7px;
  }
  .rx-card .tear{
    position:absolute; top:0; left:0; right:0; height:1px;
    border-top: 1.5px dashed var(--line);
  }

  .badge{ font-family:'IBM Plex Mono', monospace; letter-spacing:.02em; }

  .status-pending{ background:rgba(240,169,59,0.14); color:#96650E; }
  .status-ready{ background:rgba(28,130,114,0.14); color:var(--teal); }
  .status-dispensed{ background:rgba(157,187,160,0.22); color:#3E6B49; }

  .chip-trend-up{ color:#1C8272; }
  .chip-trend-down{ color:#C0442F; }

  .scrollbar-thin::-webkit-scrollbar{ height:6px; width:6px; }
  .scrollbar-thin::-webkit-scrollbar-thumb{ background: var(--line); border-radius:10px; }

  .pill-icon-bg{ }

  .submitbtn{
    background-color: var(--teal);
    color: white
    
  }
  .submitbtn :hover{
    background-color: var(--teal-2)
  }
  
</style>
</head>
<body class="min-h-screen">

<div class="flex min-h-screen">
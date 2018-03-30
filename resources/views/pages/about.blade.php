@extends('layouts.app')

@section('content')
    <h1>The ABOUT page with at least one paragraph of text.</h1>
    <p class="lead">Following is a quick copy and paste from Wikipedia on the subject of
        <br> <h5>Cross-site request forgery (CSRF)</h5>.
    </p>

    <div class="card mt-3">
        <div class="card-title pl-3">
            <h1>Cross-site request forgery</h1>
            <p class="lead">From <a href="https://en.wikipedia.org/wiki/Cross-site_request_forgery">Wikipedia</a>, the
                free encyclopedia</p>
        </div>

        <div class="card-body">
            <div class="card-text">
                <div id="mw-content-text" lang="en" dir="ltr" class="mw-content-ltr">
                    <div class="mw-parser-output"><p><b>Cross-site request forgery</b>, also known as <b>one-click
                                attack</b> or <b>session riding</b> and abbreviated as <b>CSRF</b> (sometimes pronounced
                            <i>sea-surf</i><sup id="cite_ref-Shiflett_1-0" class="reference"><a
                                        href="#cite_note-Shiflett-1">[1]</a></sup>) or <b>XSRF</b>, is a type of
                            malicious <a href="/wiki/Exploit_(computer_science)" class="mw-redirect"
                                         title="Exploit (computer science)">exploit</a> of a <a href="/wiki/Website"
                                                                                                title="Website">website</a>
                            where unauthorized commands are transmitted from a <a href="/wiki/User_(computing)"
                                                                                  title="User (computing)">user</a> that
                            the web application trusts.<sup id="cite_ref-Ristic_2-0" class="reference"><a
                                        href="#cite_note-Ristic-2">[2]</a></sup> There are many ways in which a
                            malicious website can transmit such commands; specially-crafted image tags, hidden forms,
                            and JavaScript XMLHttpRequests, for example, can all work without the user's interaction or
                            even knowledge. Unlike <a href="/wiki/Cross-site_scripting" title="Cross-site scripting">cross-site
                                scripting</a> (XSS), which exploits the trust a user has for a particular site, CSRF
                            exploits the trust that a site has in a user's browser.</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
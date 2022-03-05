<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Tracquire</title>

    <link href="https://fonts.googleapis.com/css?family=PT+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@10.7.2/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@10.7.2/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
            </style>

    <script>
        var baseUrl = "https://tracquire-app.herokuapp.com";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("vendor/scribe/js/tryitout-3.24.0.js") }}"></script>

    <script src="{{ asset("vendor/scribe/js/theme-default-3.24.0.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("vendor/scribe/images/navbar.png") }}" alt="navbar-image" />
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                                                                            <ul id="tocify-header-0" class="tocify-header">
                    <li class="tocify-item level-1" data-unique="introduction">
                        <a href="#introduction">Introduction</a>
                    </li>
                                            
                                                                    </ul>
                                                <ul id="tocify-header-1" class="tocify-header">
                    <li class="tocify-item level-1" data-unique="authenticating-requests">
                        <a href="#authenticating-requests">Authenticating requests</a>
                    </li>
                                            
                                                </ul>
                    
                    <ul id="tocify-header-2" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authentication">
                    <a href="#authentication">Authentication</a>
                </li>
                                    <ul id="tocify-subheader-authentication" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="authentication-POSTapi-auth-login">
                        <a href="#authentication-POSTapi-auth-login">Log in the user.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="authentication-POSTapi-auth-register">
                        <a href="#authentication-POSTapi-auth-register">Register user.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="authentication-GETapi-auth-user">
                        <a href="#authentication-GETapi-auth-user">Get authenticated user profile</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="authentication-GETapi-auth-logout">
                        <a href="#authentication-GETapi-auth-logout">Log user out of the app</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-3" class="tocify-header">
                <li class="tocify-item level-1" data-unique="bookmark">
                    <a href="#bookmark">Bookmark</a>
                </li>
                                    <ul id="tocify-subheader-bookmark" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="bookmark-POSTapi-v1-posts--post--bookmarks">
                        <a href="#bookmark-POSTapi-v1-posts--post--bookmarks">Bookmark Post</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="bookmark-GETapi-v1-users-bookmarks">
                        <a href="#bookmark-GETapi-v1-users-bookmarks">All Bookmarks For User</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="bookmark-DELETEapi-v1-bookmarks--bookmark-">
                        <a href="#bookmark-DELETEapi-v1-bookmarks--bookmark-">Remove Post From Bookmark</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-4" class="tocify-header">
                <li class="tocify-item level-1" data-unique="comment">
                    <a href="#comment">Comment</a>
                </li>
                                    <ul id="tocify-subheader-comment" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="comment-GETapi-v1-posts--post--comments">
                        <a href="#comment-GETapi-v1-posts--post--comments">All Comments</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="comment-GETapi-v1-users--user--comments">
                        <a href="#comment-GETapi-v1-users--user--comments">All User Comments</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="comment-POSTapi-v1-posts--post--comments">
                        <a href="#comment-POSTapi-v1-posts--post--comments">Create Post</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-5" class="tocify-header">
                <li class="tocify-item level-1" data-unique="complete-give-or-swap">
                    <a href="#complete-give-or-swap">Complete Give Or Swap</a>
                </li>
                                    <ul id="tocify-subheader-complete-give-or-swap" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="complete-give-or-swap-GETapi-v1-transactions-complete--id-">
                        <a href="#complete-give-or-swap-GETapi-v1-transactions-complete--id-">View Complete Transaction</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="complete-give-or-swap-POSTapi-v1-transactions-complete-give">
                        <a href="#complete-give-or-swap-POSTapi-v1-transactions-complete-give">Complete Give</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="complete-give-or-swap-POSTapi-v1-transactions-complete-swap">
                        <a href="#complete-give-or-swap-POSTapi-v1-transactions-complete-swap">Complete Swap</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-6" class="tocify-header">
                <li class="tocify-item level-1" data-unique="messaging">
                    <a href="#messaging">Messaging</a>
                </li>
                                    <ul id="tocify-subheader-messaging" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="messaging-POSTapi-v1-chats-send-message">
                        <a href="#messaging-POSTapi-v1-chats-send-message">Create Message</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="messaging-GETapi-v1-chats-load-messages--receiver-">
                        <a href="#messaging-GETapi-v1-chats-load-messages--receiver-">GET api/v1/chats/load/messages/{receiver}</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="messaging-GETapi-v1-chats-load">
                        <a href="#messaging-GETapi-v1-chats-load">Display a listing of the resource.</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-7" class="tocify-header">
                <li class="tocify-item level-1" data-unique="otp">
                    <a href="#otp">OTP</a>
                </li>
                                    <ul id="tocify-subheader-otp" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="otp-POSTapi-auth-email-verify-otp">
                        <a href="#otp-POSTapi-auth-email-verify-otp">Verify OTP</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-8" class="tocify-header">
                <li class="tocify-item level-1" data-unique="password">
                    <a href="#password">Password</a>
                </li>
                                    <ul id="tocify-subheader-password" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="password-POSTapi-auth-forgot-password">
                        <a href="#password-POSTapi-auth-forgot-password">Forgot Password</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="password-POSTapi-auth-reset-password">
                        <a href="#password-POSTapi-auth-reset-password">Reset Password</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-9" class="tocify-header">
                <li class="tocify-item level-1" data-unique="post">
                    <a href="#post">Post</a>
                </li>
                                    <ul id="tocify-subheader-post" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="post-GETapi-v1-posts">
                        <a href="#post-GETapi-v1-posts">All Posts</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="post-POSTapi-v1-posts">
                        <a href="#post-POSTapi-v1-posts">Create Post</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="post-GETapi-v1-posts--id-">
                        <a href="#post-GETapi-v1-posts--id-">Show Post</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="post-DELETEapi-v1-posts--id-">
                        <a href="#post-DELETEapi-v1-posts--id-">Delete Post</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="post-PATCHapi-v1-posts--id-">
                        <a href="#post-PATCHapi-v1-posts--id-">Update Post</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-10" class="tocify-header">
                <li class="tocify-item level-1" data-unique="post-categories">
                    <a href="#post-categories">Post Categories</a>
                </li>
                                    <ul id="tocify-subheader-post-categories" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="post-categories-GETapi-v1-categories">
                        <a href="#post-categories-GETapi-v1-categories">Display a listing of the resource.</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-11" class="tocify-header">
                <li class="tocify-item level-1" data-unique="search-post">
                    <a href="#search-post">Search Post</a>
                </li>
                                    <ul id="tocify-subheader-search-post" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="search-post-GETapi-v1-search">
                        <a href="#search-post-GETapi-v1-search">Search Through All Posts</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-12" class="tocify-header">
                <li class="tocify-item level-1" data-unique="shot">
                    <a href="#shot">Shot</a>
                </li>
                                    <ul id="tocify-subheader-shot" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="shot-GETapi-v1-posts--post_id--shots">
                        <a href="#shot-GETapi-v1-posts--post_id--shots">All Shots</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="shot-GETapi-v1-users--user--shots">
                        <a href="#shot-GETapi-v1-users--user--shots">All User Shots</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="shot-GETapi-v1-posts--post_id--shots--id-">
                        <a href="#shot-GETapi-v1-posts--post_id--shots--id-">Show Shot</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="shot-POSTapi-v1-posts--post--shots">
                        <a href="#shot-POSTapi-v1-posts--post--shots">Create Shot</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-13" class="tocify-header">
                <li class="tocify-item level-1" data-unique="shot-acceptance">
                    <a href="#shot-acceptance">Shot Acceptance</a>
                </li>
                                    <ul id="tocify-subheader-shot-acceptance" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="shot-acceptance-PATCHapi-v1-shots--shot--posts--post--accept">
                        <a href="#shot-acceptance-PATCHapi-v1-shots--shot--posts--post--accept">Accept Shot</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="shot-acceptance-PATCHapi-v1-shots--shot--posts--post--decline">
                        <a href="#shot-acceptance-PATCHapi-v1-shots--shot--posts--post--decline">Decline Shot</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-14" class="tocify-header">
                <li class="tocify-item level-1" data-unique="user">
                    <a href="#user">User</a>
                </li>
                                    <ul id="tocify-subheader-user" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="user-PATCHapi-v1-users--id-">
                        <a href="#user-PATCHapi-v1-users--id-">Update User Profile</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="user-POSTapi-v1-users--user--profile-image">
                        <a href="#user-POSTapi-v1-users--user--profile-image">Update Avatar</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="user-GETapi-v1-users--id-">
                        <a href="#user-GETapi-v1-users--id-">User Profile</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="user-GETapi-v1-users--user--posts">
                        <a href="#user-GETapi-v1-users--user--posts">All User Posts</a>
                    </li>
                                                    </ul>
                            </ul>
        
                        
            </div>

            <ul class="toc-footer" id="toc-footer">
                            <li><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                            <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
                    </ul>
        <ul class="toc-footer" id="last-updated">
        <li>Last updated: March 5 2022</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<p>Tracquire API Documentation</p>
<p>This documentation aims to provide all the information you need to work with our API.</p>
<aside>As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).</aside>
<blockquote>
<p>Base URL</p>
</blockquote>
<pre><code class="language-yaml">http://barter.test</code></pre>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>This API is not authenticated.</p>

        <h1 id="authentication">Authentication</h1>

    <p>API endpoints for managing authentication</p>

            <h2 id="authentication-POSTapi-auth-login">Log in the user.</h2>

<p>
</p>



<span id="example-requests-POSTapi-auth-login">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://barter.test/api/auth/login" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"suscipit\",
    \"password\": \"dolores\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://barter.test/api/auth/login"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "suscipit",
    "password": "dolores"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-auth-login">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
 &quot;status&quot;: &quot;success&quot;,
 &quot;data&quot;: {
 &quot;token&quot;: &quot;eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiO.............&quot;
 &quot;user&quot;: {
 &quot;id&quot;: 4,
&quot;first_name&quot;: &quot;John&quot;,
&quot;last_name&quot;: &quot;Doe&quot;,
&quot;username&quot;: &quot;amara.kutch&quot;,
&quot;phone&quot;: &quot;09012341234&quot;,
&quot;email&quot;: &quot;john@example.com&quot;,
&quot;user_type&quot;: 1,
&quot;email_verified_at&quot;: &quot;2022-01-09T08:51:19.000000Z&quot;,
&quot;device_name&quot;: &quot;postman&quot;,
&quot;status&quot;: 0,
&quot;ip&quot;: &quot;172.02.190&quot;,
&quot;latitude&quot;: &quot;12.10000000&quot;,
&quot;longitude&quot;: &quot;23.33000000&quot;,
&quot;country&quot;: &quot;Nigeria&quot;,
&quot;state&quot;: &quot;Lagos&quot;,
&quot;city&quot;: &quot;ikeja&quot;,
&quot;deleted_at&quot;: null,
&quot;created_at&quot;: &quot;2022-01-09T08:51:20.000000Z&quot;,
&quot;updated_at&quot;: &quot;2022-01-09T08:51:20.000000Z&quot;
  }
},
&quot;message&quot;: &quot;Logged in successfully!&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (401, Invalid Credential):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;status&quot;: &quot;error&quot;,
    &quot;data&quot;: [],
    &quot;message&quot;: &quot;invalid email or password&quot;,
    &quot;code&quot;: 401
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-auth-login" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-auth-login"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-login"></code></pre>
</span>
<span id="execution-error-POSTapi-auth-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-login"></code></pre>
</span>
<form id="form-POSTapi-auth-login" data-method="POST"
      data-path="api/auth/login"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-login', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-auth-login"
                    onclick="tryItOut('POSTapi-auth-login');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-auth-login"
                    onclick="cancelTryOut('POSTapi-auth-login');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-auth-login" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/auth/login</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="email"
               data-endpoint="POSTapi-auth-login"
               value="suscipit"
               data-component="body" hidden>
    <br>
<p>The user email address.</p>
        </p>
                <p>
            <b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="password"
               data-endpoint="POSTapi-auth-login"
               value="dolores"
               data-component="body" hidden>
    <br>
<p>The the user new password.</p>
        </p>
        </form>

            <h2 id="authentication-POSTapi-auth-register">Register user.</h2>

<p>
</p>



<span id="example-requests-POSTapi-auth-register">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://barter.test/api/auth/register" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"referrer\": \"cum\",
    \"email\": \"dolores\",
    \"password\": \"maxime\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://barter.test/api/auth/register"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "referrer": "cum",
    "email": "dolores",
    "password": "maxime"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-auth-register">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{&quot;status&quot;:&quot;success&quot;,
&quot;data&quot;:{
 &quot;user&quot;:{
     &quot;email&quot;:&quot;admuin1@dev.com&quot;,
     &quot;device_name&quot;:&quot;PostmanRuntime/7.26.8&quot;,
     &quot;status&quot;:2,
     &quot;updated_at&quot;:&quot;2022-01-09T21:18:14.000000Z&quot;,
     &quot;created_at&quot;:&quot;2022-01-09T21:18:14.000000Z&quot;,
     &quot;id&quot;:5,
     &quot;email_verified_at&quot;:&quot;2022-01-09T21:18:14.000000Z&quot;
},
 &quot;token&quot;:&quot;eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ....&quot;},
 &quot;message&quot;:&quot;Registration successful!&quot;
},</code>
 </pre>
            <blockquote>
            <p>Example response (422, Email Exist):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;status&quot;: &quot;error&quot;,
    &quot;data&quot;: {
        &quot;errors&quot;: {
            &quot;email&quot;: [
                &quot;The email has already been taken.&quot;
            ]
        }
    },
    &quot;message&quot;: &quot;The given data failed to pass validation.&quot;,
    &quot;code&quot;: 9
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-auth-register" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-auth-register"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-register"></code></pre>
</span>
<span id="execution-error-POSTapi-auth-register" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-register"></code></pre>
</span>
<form id="form-POSTapi-auth-register" data-method="POST"
      data-path="api/auth/register"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-register', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-auth-register"
                    onclick="tryItOut('POSTapi-auth-register');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-auth-register"
                    onclick="cancelTryOut('POSTapi-auth-register');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-auth-register" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/auth/register</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>referrer</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="referrer"
               data-endpoint="POSTapi-auth-register"
               value="cum"
               data-component="body" hidden>
    <br>
<p>The token sent to the user.</p>
        </p>
                <p>
            <b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="email"
               data-endpoint="POSTapi-auth-register"
               value="dolores"
               data-component="body" hidden>
    <br>
<p>The the user email,this is a unique field.</p>
        </p>
                <p>
            <b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="password"
               data-endpoint="POSTapi-auth-register"
               value="maxime"
               data-component="body" hidden>
    <br>
<p>The user password.</p>
        </p>
        </form>

            <h2 id="authentication-GETapi-auth-user">Get authenticated user profile</h2>

<p>
</p>



<span id="example-requests-GETapi-auth-user">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://barter.test/api/auth/user" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://barter.test/api/auth/user"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-auth-user">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: ://barter.test:
access-control-allow-credentials: true
access-control-allow-methods: POST, GET, OPTIONS, PUT, DELETE, PATCH
access-control-allow-headers: X-Requested-With, Content-Type, Origin, Authorization
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;status&quot;: &quot;error&quot;,
    &quot;data&quot;: [],
    &quot;message&quot;: &quot;Unauthenticated.&quot;,
    &quot;code&quot;: 10
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-auth-user" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-auth-user"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-auth-user"></code></pre>
</span>
<span id="execution-error-GETapi-auth-user" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-auth-user"></code></pre>
</span>
<form id="form-GETapi-auth-user" data-method="GET"
      data-path="api/auth/user"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-auth-user', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-auth-user"
                    onclick="tryItOut('GETapi-auth-user');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-auth-user"
                    onclick="cancelTryOut('GETapi-auth-user');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-auth-user" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/auth/user</code></b>
        </p>
                    </form>

            <h2 id="authentication-GETapi-auth-logout">Log user out of the app</h2>

<p>
</p>



<span id="example-requests-GETapi-auth-logout">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://barter.test/api/auth/logout" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://barter.test/api/auth/logout"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-auth-logout">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: ://barter.test:
access-control-allow-credentials: true
access-control-allow-methods: POST, GET, OPTIONS, PUT, DELETE, PATCH
access-control-allow-headers: X-Requested-With, Content-Type, Origin, Authorization
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;status&quot;: &quot;error&quot;,
    &quot;data&quot;: [],
    &quot;message&quot;: &quot;Unauthenticated.&quot;,
    &quot;code&quot;: 10
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-auth-logout" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-auth-logout"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-auth-logout"></code></pre>
</span>
<span id="execution-error-GETapi-auth-logout" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-auth-logout"></code></pre>
</span>
<form id="form-GETapi-auth-logout" data-method="GET"
      data-path="api/auth/logout"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-auth-logout', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-auth-logout"
                    onclick="tryItOut('GETapi-auth-logout');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-auth-logout"
                    onclick="cancelTryOut('GETapi-auth-logout');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-auth-logout" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/auth/logout</code></b>
        </p>
                    </form>

        <h1 id="bookmark">Bookmark</h1>

    

            <h2 id="bookmark-POSTapi-v1-posts--post--bookmarks">Bookmark Post</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint is used to add the supplied post to authenticated user bookmark</p>

<span id="example-requests-POSTapi-v1-posts--post--bookmarks">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://barter.test/api/v1/posts/5/bookmarks" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://barter.test/api/v1/posts/5/bookmarks"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-posts--post--bookmarks">
</span>
<span id="execution-results-POSTapi-v1-posts--post--bookmarks" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-posts--post--bookmarks"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-posts--post--bookmarks"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-posts--post--bookmarks" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-posts--post--bookmarks"></code></pre>
</span>
<form id="form-POSTapi-v1-posts--post--bookmarks" data-method="POST"
      data-path="api/v1/posts/{post}/bookmarks"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-posts--post--bookmarks', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-posts--post--bookmarks"
                    onclick="tryItOut('POSTapi-v1-posts--post--bookmarks');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-posts--post--bookmarks"
                    onclick="cancelTryOut('POSTapi-v1-posts--post--bookmarks');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-posts--post--bookmarks" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/posts/{post}/bookmarks</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-v1-posts--post--bookmarks" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-v1-posts--post--bookmarks"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>post</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="post"
               data-endpoint="POSTapi-v1-posts--post--bookmarks"
               value="5"
               data-component="url" hidden>
    <br>
<p>The post's ID.</p>
            </p>
                    </form>

            <h2 id="bookmark-GETapi-v1-users-bookmarks">All Bookmarks For User</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint is used to fetch all the post the authenticated user has bookmarked</p>

<span id="example-requests-GETapi-v1-users-bookmarks">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://barter.test/api/v1/users/bookmarks" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://barter.test/api/v1/users/bookmarks"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-users-bookmarks">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: ://barter.test:
access-control-allow-credentials: true
access-control-allow-methods: POST, GET, OPTIONS, PUT, DELETE, PATCH
access-control-allow-headers: X-Requested-With, Content-Type, Origin, Authorization
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;status&quot;: &quot;error&quot;,
    &quot;data&quot;: [],
    &quot;message&quot;: &quot;Unauthenticated.&quot;,
    &quot;code&quot;: 10
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-users-bookmarks" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-users-bookmarks"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-users-bookmarks"></code></pre>
</span>
<span id="execution-error-GETapi-v1-users-bookmarks" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-users-bookmarks"></code></pre>
</span>
<form id="form-GETapi-v1-users-bookmarks" data-method="GET"
      data-path="api/v1/users/bookmarks"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-users-bookmarks', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-users-bookmarks"
                    onclick="tryItOut('GETapi-v1-users-bookmarks');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-users-bookmarks"
                    onclick="cancelTryOut('GETapi-v1-users-bookmarks');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-users-bookmarks" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/users/bookmarks</code></b>
        </p>
                <p>
            <label id="auth-GETapi-v1-users-bookmarks" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-v1-users-bookmarks"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="bookmark-DELETEapi-v1-bookmarks--bookmark-">Remove Post From Bookmark</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This supplied ID will be used detach the post from user bookmarks</p>

<span id="example-requests-DELETEapi-v1-bookmarks--bookmark-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://barter.test/api/v1/bookmarks/10" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://barter.test/api/v1/bookmarks/10"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-v1-bookmarks--bookmark-">
</span>
<span id="execution-results-DELETEapi-v1-bookmarks--bookmark-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-v1-bookmarks--bookmark-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-v1-bookmarks--bookmark-"></code></pre>
</span>
<span id="execution-error-DELETEapi-v1-bookmarks--bookmark-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-v1-bookmarks--bookmark-"></code></pre>
</span>
<form id="form-DELETEapi-v1-bookmarks--bookmark-" data-method="DELETE"
      data-path="api/v1/bookmarks/{bookmark}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-v1-bookmarks--bookmark-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-v1-bookmarks--bookmark-"
                    onclick="tryItOut('DELETEapi-v1-bookmarks--bookmark-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-v1-bookmarks--bookmark-"
                    onclick="cancelTryOut('DELETEapi-v1-bookmarks--bookmark-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-v1-bookmarks--bookmark-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/v1/bookmarks/{bookmark}</code></b>
        </p>
                <p>
            <label id="auth-DELETEapi-v1-bookmarks--bookmark-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="DELETEapi-v1-bookmarks--bookmark-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>bookmark</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="bookmark"
               data-endpoint="DELETEapi-v1-bookmarks--bookmark-"
               value="10"
               data-component="url" hidden>
    <br>
<p>The bookmark's ID.</p>
            </p>
                    </form>

        <h1 id="comment">Comment</h1>

    

            <h2 id="comment-GETapi-v1-posts--post--comments">All Comments</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint can be used to fetch all comments under a post</p>

<span id="example-requests-GETapi-v1-posts--post--comments">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://barter.test/api/v1/posts/1/comments" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://barter.test/api/v1/posts/1/comments"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-posts--post--comments">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: &quot;21&quot;,
            &quot;type&quot;: &quot;comments&quot;,
            &quot;attributes&quot;: {
                &quot;body&quot;: &quot;Voluptatem autem aut sed animi quia temporibus molestiae.&quot;,
                &quot;author&quot;: {
                    &quot;id&quot;: &quot;4&quot;,
                    &quot;type&quot;: &quot;users&quot;,
                    &quot;attributes&quot;: {
                        &quot;first_name&quot;: &quot;John&quot;,
                        &quot;last_name&quot;: &quot;Doe&quot;,
                        &quot;username&quot;: &quot;swolff&quot;,
                        &quot;phone&quot;: &quot;09012341234&quot;,
                        &quot;email&quot;: &quot;john@example.com&quot;,
                        &quot;referrer_token&quot;: &quot;ADM123&quot;,
                        &quot;user_type&quot;: 1,
                        &quot;country&quot;: &quot;Nigeria&quot;,
                        &quot;state&quot;: &quot;Lagos&quot;,
                        &quot;city&quot;: &quot;ikeja&quot;,
                        &quot;avatar&quot;: &quot;&quot;,
                        &quot;no_of_posts&quot;: null,
                        &quot;no_of_bookmarks&quot;: null,
                        &quot;earnings&quot;: &quot;0&quot;
                    },
                    &quot;relationships&quot;: {
                        &quot;posts&quot;: {
                            &quot;links&quot;: {
                                &quot;related&quot;: &quot;http://barter.test/api/v1/users/4/posts&quot;
                            }
                        },
                        &quot;comments&quot;: {
                            &quot;links&quot;: {
                                &quot;related&quot;: &quot;http://barter.test/api/v1/users/4/comments&quot;
                            }
                        },
                        &quot;shots&quot;: {
                            &quot;links&quot;: {
                                &quot;related&quot;: &quot;http://barter.test/api/v1/users/4/shots&quot;
                            }
                        },
                        &quot;transactions&quot;: {
                            &quot;links&quot;: {
                                &quot;related&quot;: &quot;http://barter.test/api/v1/transactions/complete/4&quot;
                            }
                        }
                    },
                    &quot;meta&quot;: {
                        &quot;posts_count&quot;: null,
                        &quot;transactions_count&quot;: 0
                    },
                    &quot;included&quot;: []
                },
                &quot;created_at&quot;: &quot;2022-03-05T21:53:36.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2022-03-05T21:53:36.000000Z&quot;
            },
            &quot;relationships&quot;: {
                &quot;post&quot;: {
                    &quot;links&quot;: {
                        &quot;related&quot;: &quot;http://barter.test/api/v1/posts/13&quot;
                    }
                }
            }
        },
        {
            &quot;id&quot;: &quot;22&quot;,
            &quot;type&quot;: &quot;comments&quot;,
            &quot;attributes&quot;: {
                &quot;body&quot;: &quot;Est omnis ex cumque dolorem nisi nostrum ad molestiae.&quot;,
                &quot;author&quot;: {
                    &quot;id&quot;: &quot;3&quot;,
                    &quot;type&quot;: &quot;users&quot;,
                    &quot;attributes&quot;: {
                        &quot;first_name&quot;: &quot;Garret&quot;,
                        &quot;last_name&quot;: &quot;Ebert&quot;,
                        &quot;username&quot;: &quot;ottilie89&quot;,
                        &quot;phone&quot;: &quot;513-557-9943&quot;,
                        &quot;email&quot;: &quot;curt.cruickshank@example.net&quot;,
                        &quot;referrer_token&quot;: &quot;X24X40&quot;,
                        &quot;user_type&quot;: 2,
                        &quot;country&quot;: &quot;Germany&quot;,
                        &quot;state&quot;: &quot;North Rhine-Westphalia&quot;,
                        &quot;city&quot;: &quot;Bonn&quot;,
                        &quot;avatar&quot;: &quot;&quot;,
                        &quot;no_of_posts&quot;: null,
                        &quot;no_of_bookmarks&quot;: null,
                        &quot;earnings&quot;: &quot;0&quot;
                    },
                    &quot;relationships&quot;: {
                        &quot;posts&quot;: {
                            &quot;links&quot;: {
                                &quot;related&quot;: &quot;http://barter.test/api/v1/users/3/posts&quot;
                            }
                        },
                        &quot;comments&quot;: {
                            &quot;links&quot;: {
                                &quot;related&quot;: &quot;http://barter.test/api/v1/users/3/comments&quot;
                            }
                        },
                        &quot;shots&quot;: {
                            &quot;links&quot;: {
                                &quot;related&quot;: &quot;http://barter.test/api/v1/users/3/shots&quot;
                            }
                        },
                        &quot;transactions&quot;: {
                            &quot;links&quot;: {
                                &quot;related&quot;: &quot;http://barter.test/api/v1/transactions/complete/3&quot;
                            }
                        }
                    },
                    &quot;meta&quot;: {
                        &quot;posts_count&quot;: null,
                        &quot;transactions_count&quot;: 0
                    },
                    &quot;included&quot;: []
                },
                &quot;created_at&quot;: &quot;2022-03-05T21:53:36.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2022-03-05T21:53:36.000000Z&quot;
            },
            &quot;relationships&quot;: {
                &quot;post&quot;: {
                    &quot;links&quot;: {
                        &quot;related&quot;: &quot;http://barter.test/api/v1/posts/6&quot;
                    }
                }
            }
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-posts--post--comments" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-posts--post--comments"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-posts--post--comments"></code></pre>
</span>
<span id="execution-error-GETapi-v1-posts--post--comments" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-posts--post--comments"></code></pre>
</span>
<form id="form-GETapi-v1-posts--post--comments" data-method="GET"
      data-path="api/v1/posts/{post}/comments"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-posts--post--comments', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-posts--post--comments"
                    onclick="tryItOut('GETapi-v1-posts--post--comments');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-posts--post--comments"
                    onclick="cancelTryOut('GETapi-v1-posts--post--comments');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-posts--post--comments" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/posts/{post}/comments</code></b>
        </p>
                <p>
            <label id="auth-GETapi-v1-posts--post--comments" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-v1-posts--post--comments"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>post</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="post"
               data-endpoint="GETapi-v1-posts--post--comments"
               value="1"
               data-component="url" hidden>
    <br>

            </p>
                    </form>

            <h2 id="comment-GETapi-v1-users--user--comments">All User Comments</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-users--user--comments">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://barter.test/api/v1/users/18/comments" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://barter.test/api/v1/users/18/comments"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-users--user--comments">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: &quot;24&quot;,
            &quot;type&quot;: &quot;comments&quot;,
            &quot;attributes&quot;: {
                &quot;body&quot;: &quot;Aperiam iure at reiciendis doloribus.&quot;,
                &quot;author&quot;: {
                    &quot;id&quot;: &quot;3&quot;,
                    &quot;type&quot;: &quot;users&quot;,
                    &quot;attributes&quot;: {
                        &quot;first_name&quot;: &quot;Garret&quot;,
                        &quot;last_name&quot;: &quot;Ebert&quot;,
                        &quot;username&quot;: &quot;ottilie89&quot;,
                        &quot;phone&quot;: &quot;513-557-9943&quot;,
                        &quot;email&quot;: &quot;curt.cruickshank@example.net&quot;,
                        &quot;referrer_token&quot;: &quot;X24X40&quot;,
                        &quot;user_type&quot;: 2,
                        &quot;country&quot;: &quot;Germany&quot;,
                        &quot;state&quot;: &quot;North Rhine-Westphalia&quot;,
                        &quot;city&quot;: &quot;Bonn&quot;,
                        &quot;avatar&quot;: &quot;&quot;,
                        &quot;no_of_posts&quot;: null,
                        &quot;no_of_bookmarks&quot;: null,
                        &quot;earnings&quot;: &quot;0&quot;
                    },
                    &quot;relationships&quot;: {
                        &quot;posts&quot;: {
                            &quot;links&quot;: {
                                &quot;related&quot;: &quot;http://barter.test/api/v1/users/3/posts&quot;
                            }
                        },
                        &quot;comments&quot;: {
                            &quot;links&quot;: {
                                &quot;related&quot;: &quot;http://barter.test/api/v1/users/3/comments&quot;
                            }
                        },
                        &quot;shots&quot;: {
                            &quot;links&quot;: {
                                &quot;related&quot;: &quot;http://barter.test/api/v1/users/3/shots&quot;
                            }
                        },
                        &quot;transactions&quot;: {
                            &quot;links&quot;: {
                                &quot;related&quot;: &quot;http://barter.test/api/v1/transactions/complete/3&quot;
                            }
                        }
                    },
                    &quot;meta&quot;: {
                        &quot;posts_count&quot;: null,
                        &quot;transactions_count&quot;: 0
                    },
                    &quot;included&quot;: []
                },
                &quot;created_at&quot;: &quot;2022-03-05T21:53:43.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2022-03-05T21:53:43.000000Z&quot;
            },
            &quot;relationships&quot;: {
                &quot;post&quot;: {
                    &quot;links&quot;: {
                        &quot;related&quot;: &quot;http://barter.test/api/v1/posts/10&quot;
                    }
                }
            }
        },
        {
            &quot;id&quot;: &quot;25&quot;,
            &quot;type&quot;: &quot;comments&quot;,
            &quot;attributes&quot;: {
                &quot;body&quot;: &quot;Accusantium ullam eum at recusandae ullam aut enim.&quot;,
                &quot;author&quot;: {
                    &quot;id&quot;: &quot;4&quot;,
                    &quot;type&quot;: &quot;users&quot;,
                    &quot;attributes&quot;: {
                        &quot;first_name&quot;: &quot;John&quot;,
                        &quot;last_name&quot;: &quot;Doe&quot;,
                        &quot;username&quot;: &quot;swolff&quot;,
                        &quot;phone&quot;: &quot;09012341234&quot;,
                        &quot;email&quot;: &quot;john@example.com&quot;,
                        &quot;referrer_token&quot;: &quot;ADM123&quot;,
                        &quot;user_type&quot;: 1,
                        &quot;country&quot;: &quot;Nigeria&quot;,
                        &quot;state&quot;: &quot;Lagos&quot;,
                        &quot;city&quot;: &quot;ikeja&quot;,
                        &quot;avatar&quot;: &quot;&quot;,
                        &quot;no_of_posts&quot;: null,
                        &quot;no_of_bookmarks&quot;: null,
                        &quot;earnings&quot;: &quot;0&quot;
                    },
                    &quot;relationships&quot;: {
                        &quot;posts&quot;: {
                            &quot;links&quot;: {
                                &quot;related&quot;: &quot;http://barter.test/api/v1/users/4/posts&quot;
                            }
                        },
                        &quot;comments&quot;: {
                            &quot;links&quot;: {
                                &quot;related&quot;: &quot;http://barter.test/api/v1/users/4/comments&quot;
                            }
                        },
                        &quot;shots&quot;: {
                            &quot;links&quot;: {
                                &quot;related&quot;: &quot;http://barter.test/api/v1/users/4/shots&quot;
                            }
                        },
                        &quot;transactions&quot;: {
                            &quot;links&quot;: {
                                &quot;related&quot;: &quot;http://barter.test/api/v1/transactions/complete/4&quot;
                            }
                        }
                    },
                    &quot;meta&quot;: {
                        &quot;posts_count&quot;: null,
                        &quot;transactions_count&quot;: 0
                    },
                    &quot;included&quot;: []
                },
                &quot;created_at&quot;: &quot;2022-03-05T21:53:43.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2022-03-05T21:53:43.000000Z&quot;
            },
            &quot;relationships&quot;: {
                &quot;post&quot;: {
                    &quot;links&quot;: {
                        &quot;related&quot;: &quot;http://barter.test/api/v1/posts/8&quot;
                    }
                }
            }
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-users--user--comments" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-users--user--comments"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-users--user--comments"></code></pre>
</span>
<span id="execution-error-GETapi-v1-users--user--comments" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-users--user--comments"></code></pre>
</span>
<form id="form-GETapi-v1-users--user--comments" data-method="GET"
      data-path="api/v1/users/{user}/comments"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-users--user--comments', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-users--user--comments"
                    onclick="tryItOut('GETapi-v1-users--user--comments');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-users--user--comments"
                    onclick="cancelTryOut('GETapi-v1-users--user--comments');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-users--user--comments" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/users/{user}/comments</code></b>
        </p>
                <p>
            <label id="auth-GETapi-v1-users--user--comments" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-v1-users--user--comments"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>user</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="user"
               data-endpoint="GETapi-v1-users--user--comments"
               value="18"
               data-component="url" hidden>
    <br>

            </p>
                    </form>

            <h2 id="comment-POSTapi-v1-posts--post--comments">Create Post</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-v1-posts--post--comments">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://barter.test/api/v1/posts/1/comments" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"body\": \"qui\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://barter.test/api/v1/posts/1/comments"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "body": "qui"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-posts--post--comments">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;data&quot;: {
        &quot;id&quot;: &quot;23&quot;,
        &quot;type&quot;: &quot;comments&quot;,
        &quot;attributes&quot;: {
            &quot;body&quot;: &quot;Ducimus omnis fugiat omnis impedit sit odit veniam.&quot;,
            &quot;author&quot;: {
                &quot;id&quot;: &quot;2&quot;,
                &quot;type&quot;: &quot;users&quot;,
                &quot;attributes&quot;: {
                    &quot;first_name&quot;: &quot;Eve&quot;,
                    &quot;last_name&quot;: &quot;Wintheiser&quot;,
                    &quot;username&quot;: &quot;ireilly&quot;,
                    &quot;phone&quot;: &quot;865.423.8459&quot;,
                    &quot;email&quot;: &quot;douglas.loyal@example.org&quot;,
                    &quot;referrer_token&quot;: &quot;FJ2QJ0&quot;,
                    &quot;user_type&quot;: 2,
                    &quot;country&quot;: &quot;United Kingdom&quot;,
                    &quot;state&quot;: &quot;England&quot;,
                    &quot;city&quot;: &quot;Colindale&quot;,
                    &quot;avatar&quot;: &quot;&quot;,
                    &quot;no_of_posts&quot;: null,
                    &quot;no_of_bookmarks&quot;: null,
                    &quot;earnings&quot;: &quot;0&quot;
                },
                &quot;relationships&quot;: {
                    &quot;posts&quot;: {
                        &quot;links&quot;: {
                            &quot;related&quot;: &quot;http://barter.test/api/v1/users/2/posts&quot;
                        }
                    },
                    &quot;comments&quot;: {
                        &quot;links&quot;: {
                            &quot;related&quot;: &quot;http://barter.test/api/v1/users/2/comments&quot;
                        }
                    },
                    &quot;shots&quot;: {
                        &quot;links&quot;: {
                            &quot;related&quot;: &quot;http://barter.test/api/v1/users/2/shots&quot;
                        }
                    },
                    &quot;transactions&quot;: {
                        &quot;links&quot;: {
                            &quot;related&quot;: &quot;http://barter.test/api/v1/transactions/complete/2&quot;
                        }
                    }
                },
                &quot;meta&quot;: {
                    &quot;posts_count&quot;: null,
                    &quot;transactions_count&quot;: 0
                },
                &quot;included&quot;: []
            },
            &quot;created_at&quot;: &quot;2022-03-05T21:53:36.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-03-05T21:53:36.000000Z&quot;
        },
        &quot;relationships&quot;: {
            &quot;post&quot;: {
                &quot;links&quot;: {
                    &quot;related&quot;: &quot;http://barter.test/api/v1/posts/10&quot;
                }
            }
        }
    }
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-posts--post--comments" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-posts--post--comments"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-posts--post--comments"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-posts--post--comments" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-posts--post--comments"></code></pre>
</span>
<form id="form-POSTapi-v1-posts--post--comments" data-method="POST"
      data-path="api/v1/posts/{post}/comments"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-posts--post--comments', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-posts--post--comments"
                    onclick="tryItOut('POSTapi-v1-posts--post--comments');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-posts--post--comments"
                    onclick="cancelTryOut('POSTapi-v1-posts--post--comments');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-posts--post--comments" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/posts/{post}/comments</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-v1-posts--post--comments" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-v1-posts--post--comments"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>post</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="post"
               data-endpoint="POSTapi-v1-posts--post--comments"
               value="1"
               data-component="url" hidden>
    <br>

            </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>body</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="body"
               data-endpoint="POSTapi-v1-posts--post--comments"
               value="qui"
               data-component="body" hidden>
    <br>
<p>The body of the post and it is maximum of 255 character.</p>
        </p>
        </form>

        <h1 id="complete-give-or-swap">Complete Give Or Swap</h1>

    

            <h2 id="complete-give-or-swap-GETapi-v1-transactions-complete--id-">View Complete Transaction</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-transactions-complete--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://barter.test/api/v1/transactions/complete/necessitatibus" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://barter.test/api/v1/transactions/complete/necessitatibus"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-transactions-complete--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: ://barter.test:
access-control-allow-credentials: true
access-control-allow-methods: POST, GET, OPTIONS, PUT, DELETE, PATCH
access-control-allow-headers: X-Requested-With, Content-Type, Origin, Authorization
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;status&quot;: &quot;error&quot;,
    &quot;data&quot;: [],
    &quot;message&quot;: &quot;Unauthenticated.&quot;,
    &quot;code&quot;: 10
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-transactions-complete--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-transactions-complete--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-transactions-complete--id-"></code></pre>
</span>
<span id="execution-error-GETapi-v1-transactions-complete--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-transactions-complete--id-"></code></pre>
</span>
<form id="form-GETapi-v1-transactions-complete--id-" data-method="GET"
      data-path="api/v1/transactions/complete/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-transactions-complete--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-transactions-complete--id-"
                    onclick="tryItOut('GETapi-v1-transactions-complete--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-transactions-complete--id-"
                    onclick="cancelTryOut('GETapi-v1-transactions-complete--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-transactions-complete--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/transactions/complete/{id}</code></b>
        </p>
                <p>
            <label id="auth-GETapi-v1-transactions-complete--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-v1-transactions-complete--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="id"
               data-endpoint="GETapi-v1-transactions-complete--id-"
               value="necessitatibus"
               data-component="url" hidden>
    <br>
<p>The ID of the complete.</p>
            </p>
                    </form>

            <h2 id="complete-give-or-swap-POSTapi-v1-transactions-complete-give">Complete Give</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-v1-transactions-complete-give">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://barter.test/api/v1/transactions/complete/give" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"post_id\": 8,
    \"receiver_username\": \"perspiciatis\",
    \"username\": \"dolores\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://barter.test/api/v1/transactions/complete/give"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "post_id": 8,
    "receiver_username": "perspiciatis",
    "username": "dolores"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-transactions-complete-give">
</span>
<span id="execution-results-POSTapi-v1-transactions-complete-give" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-transactions-complete-give"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-transactions-complete-give"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-transactions-complete-give" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-transactions-complete-give"></code></pre>
</span>
<form id="form-POSTapi-v1-transactions-complete-give" data-method="POST"
      data-path="api/v1/transactions/complete/give"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-transactions-complete-give', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-transactions-complete-give"
                    onclick="tryItOut('POSTapi-v1-transactions-complete-give');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-transactions-complete-give"
                    onclick="cancelTryOut('POSTapi-v1-transactions-complete-give');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-transactions-complete-give" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/transactions/complete/give</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-v1-transactions-complete-give" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-v1-transactions-complete-give"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>post_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="post_id"
               data-endpoint="POSTapi-v1-transactions-complete-give"
               value="8"
               data-component="body" hidden>
    <br>
<p>The post id.</p>
        </p>
                <p>
            <b><code>receiver_username</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="receiver_username"
               data-endpoint="POSTapi-v1-transactions-complete-give"
               value="perspiciatis"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>username</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="username"
               data-endpoint="POSTapi-v1-transactions-complete-give"
               value="dolores"
               data-component="body" hidden>
    <br>
<p>The username of the user accepting poster item or swapping poster item.</p>
        </p>
        </form>

            <h2 id="complete-give-or-swap-POSTapi-v1-transactions-complete-swap">Complete Swap</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-v1-transactions-complete-swap">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://barter.test/api/v1/transactions/complete/swap" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"post_id\": 11,
    \"receiver_username\": \"ratione\",
    \"username\": \"ut\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://barter.test/api/v1/transactions/complete/swap"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "post_id": 11,
    "receiver_username": "ratione",
    "username": "ut"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-transactions-complete-swap">
</span>
<span id="execution-results-POSTapi-v1-transactions-complete-swap" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-transactions-complete-swap"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-transactions-complete-swap"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-transactions-complete-swap" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-transactions-complete-swap"></code></pre>
</span>
<form id="form-POSTapi-v1-transactions-complete-swap" data-method="POST"
      data-path="api/v1/transactions/complete/swap"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-transactions-complete-swap', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-transactions-complete-swap"
                    onclick="tryItOut('POSTapi-v1-transactions-complete-swap');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-transactions-complete-swap"
                    onclick="cancelTryOut('POSTapi-v1-transactions-complete-swap');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-transactions-complete-swap" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/transactions/complete/swap</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-v1-transactions-complete-swap" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-v1-transactions-complete-swap"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>post_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="post_id"
               data-endpoint="POSTapi-v1-transactions-complete-swap"
               value="11"
               data-component="body" hidden>
    <br>
<p>The post id.</p>
        </p>
                <p>
            <b><code>receiver_username</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="receiver_username"
               data-endpoint="POSTapi-v1-transactions-complete-swap"
               value="ratione"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>username</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="username"
               data-endpoint="POSTapi-v1-transactions-complete-swap"
               value="ut"
               data-component="body" hidden>
    <br>
<p>The username of the user accepting poster item or swapping poster item.</p>
        </p>
        </form>

        <h1 id="messaging">Messaging</h1>

    

            <h2 id="messaging-POSTapi-v1-chats-send-message">Create Message</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-v1-chats-send-message">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://barter.test/api/v1/chats/send/message" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"receiver\": 10,
    \"message\": \"et\",
    \"data\": [
        \"facere\"
    ]
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://barter.test/api/v1/chats/send/message"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "receiver": 10,
    "message": "et",
    "data": [
        "facere"
    ]
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-chats-send-message">
</span>
<span id="execution-results-POSTapi-v1-chats-send-message" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-chats-send-message"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-chats-send-message"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-chats-send-message" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-chats-send-message"></code></pre>
</span>
<form id="form-POSTapi-v1-chats-send-message" data-method="POST"
      data-path="api/v1/chats/send/message"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-chats-send-message', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-chats-send-message"
                    onclick="tryItOut('POSTapi-v1-chats-send-message');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-chats-send-message"
                    onclick="cancelTryOut('POSTapi-v1-chats-send-message');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-chats-send-message" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/chats/send/message</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-v1-chats-send-message" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-v1-chats-send-message"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>receiver</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="receiver"
               data-endpoint="POSTapi-v1-chats-send-message"
               value="10"
               data-component="body" hidden>
    <br>
<p>The user receiving the message ID.</p>
        </p>
                <p>
            <b><code>message</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="message"
               data-endpoint="POSTapi-v1-chats-send-message"
               value="et"
               data-component="body" hidden>
    <br>
<p>The message been sent to the user.</p>
        </p>
                <p>
            <b><code>data</code></b>&nbsp;&nbsp;<small>string[]</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="data[0]"
               data-endpoint="POSTapi-v1-chats-send-message"
               data-component="body" hidden>
        <input type="text"
               name="data[1]"
               data-endpoint="POSTapi-v1-chats-send-message"
               data-component="body" hidden>
    <br>
<p>This will hold extra data later on(not needed for now).</p>
        </p>
        </form>

            <h2 id="messaging-GETapi-v1-chats-load-messages--receiver-">GET api/v1/chats/load/messages/{receiver}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-chats-load-messages--receiver-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://barter.test/api/v1/chats/load/messages/7" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://barter.test/api/v1/chats/load/messages/7"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-chats-load-messages--receiver-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: ://barter.test:
access-control-allow-credentials: true
access-control-allow-methods: POST, GET, OPTIONS, PUT, DELETE, PATCH
access-control-allow-headers: X-Requested-With, Content-Type, Origin, Authorization
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;status&quot;: &quot;error&quot;,
    &quot;data&quot;: [],
    &quot;message&quot;: &quot;Unauthenticated.&quot;,
    &quot;code&quot;: 10
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-chats-load-messages--receiver-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-chats-load-messages--receiver-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-chats-load-messages--receiver-"></code></pre>
</span>
<span id="execution-error-GETapi-v1-chats-load-messages--receiver-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-chats-load-messages--receiver-"></code></pre>
</span>
<form id="form-GETapi-v1-chats-load-messages--receiver-" data-method="GET"
      data-path="api/v1/chats/load/messages/{receiver}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-chats-load-messages--receiver-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-chats-load-messages--receiver-"
                    onclick="tryItOut('GETapi-v1-chats-load-messages--receiver-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-chats-load-messages--receiver-"
                    onclick="cancelTryOut('GETapi-v1-chats-load-messages--receiver-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-chats-load-messages--receiver-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/chats/load/messages/{receiver}</code></b>
        </p>
                <p>
            <label id="auth-GETapi-v1-chats-load-messages--receiver-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-v1-chats-load-messages--receiver-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>receiver</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="receiver"
               data-endpoint="GETapi-v1-chats-load-messages--receiver-"
               value="7"
               data-component="url" hidden>
    <br>

            </p>
                    </form>

            <h2 id="messaging-GETapi-v1-chats-load">Display a listing of the resource.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-chats-load">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://barter.test/api/v1/chats/load" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://barter.test/api/v1/chats/load"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-chats-load">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: ://barter.test:
access-control-allow-credentials: true
access-control-allow-methods: POST, GET, OPTIONS, PUT, DELETE, PATCH
access-control-allow-headers: X-Requested-With, Content-Type, Origin, Authorization
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;status&quot;: &quot;error&quot;,
    &quot;data&quot;: [],
    &quot;message&quot;: &quot;Unauthenticated.&quot;,
    &quot;code&quot;: 10
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-chats-load" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-chats-load"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-chats-load"></code></pre>
</span>
<span id="execution-error-GETapi-v1-chats-load" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-chats-load"></code></pre>
</span>
<form id="form-GETapi-v1-chats-load" data-method="GET"
      data-path="api/v1/chats/load"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-chats-load', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-chats-load"
                    onclick="tryItOut('GETapi-v1-chats-load');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-chats-load"
                    onclick="cancelTryOut('GETapi-v1-chats-load');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-chats-load" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/chats/load</code></b>
        </p>
                <p>
            <label id="auth-GETapi-v1-chats-load" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-v1-chats-load"
                                                                data-component="header"></label>
        </p>
                </form>

        <h1 id="otp">OTP</h1>

    <p>API endpoints for generating and verifying OTP</p>

            <h2 id="otp-POSTapi-auth-email-verify-otp">Verify OTP</h2>

<p>
</p>

<p>This endpoint can be used to verify OTP sent to a user</p>

<span id="example-requests-POSTapi-auth-email-verify-otp">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://barter.test/api/auth/email/verify/otp" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"velit\",
    \"otp\": \"ad\",
    \"token\": \"fugit\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://barter.test/api/auth/email/verify/otp"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "velit",
    "otp": "ad",
    "token": "fugit"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-auth-email-verify-otp">
</span>
<span id="execution-results-POSTapi-auth-email-verify-otp" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-auth-email-verify-otp"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-email-verify-otp"></code></pre>
</span>
<span id="execution-error-POSTapi-auth-email-verify-otp" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-email-verify-otp"></code></pre>
</span>
<form id="form-POSTapi-auth-email-verify-otp" data-method="POST"
      data-path="api/auth/email/verify/otp"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-email-verify-otp', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-auth-email-verify-otp"
                    onclick="tryItOut('POSTapi-auth-email-verify-otp');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-auth-email-verify-otp"
                    onclick="cancelTryOut('POSTapi-auth-email-verify-otp');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-auth-email-verify-otp" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/auth/email/verify/otp</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="email"
               data-endpoint="POSTapi-auth-email-verify-otp"
               value="velit"
               data-component="body" hidden>
    <br>
<p>The user email address.</p>
        </p>
                <p>
            <b><code>otp</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="otp"
               data-endpoint="POSTapi-auth-email-verify-otp"
               value="ad"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>token</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="token"
               data-endpoint="POSTapi-auth-email-verify-otp"
               value="fugit"
               data-component="body" hidden>
    <br>
<p>The otp sent to the user email address.</p>
        </p>
        </form>

        <h1 id="password">Password</h1>

    <p>API endpoints for managing authentication</p>

            <h2 id="password-POSTapi-auth-forgot-password">Forgot Password</h2>

<p>
</p>

<p>A token will be sent to user email address</p>

<span id="example-requests-POSTapi-auth-forgot-password">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://barter.test/api/auth/forgot-password" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"johndoes@example.com\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://barter.test/api/auth/forgot-password"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "johndoes@example.com"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-auth-forgot-password">
            <blockquote>
            <p>Example response (401, Email Does Not Exist):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;status&quot;: &quot;error&quot;,
    &quot;data&quot;: [],
    &quot;message&quot;: &quot;The supplied email does not exist&quot;,
    &quot;code&quot;: 404
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-auth-forgot-password" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-auth-forgot-password"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-forgot-password"></code></pre>
</span>
<span id="execution-error-POSTapi-auth-forgot-password" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-forgot-password"></code></pre>
</span>
<form id="form-POSTapi-auth-forgot-password" data-method="POST"
      data-path="api/auth/forgot-password"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-forgot-password', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-auth-forgot-password"
                    onclick="tryItOut('POSTapi-auth-forgot-password');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-auth-forgot-password"
                    onclick="cancelTryOut('POSTapi-auth-forgot-password');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-auth-forgot-password" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/auth/forgot-password</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="email"
               data-endpoint="POSTapi-auth-forgot-password"
               value="johndoes@example.com"
               data-component="body" hidden>
    <br>
<p>The email of the  user.</p>
        </p>
        </form>

            <h2 id="password-POSTapi-auth-reset-password">Reset Password</h2>

<p>
</p>

<p>User is expected to supply the token sent to his email address and a new password</p>

<span id="example-requests-POSTapi-auth-reset-password">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://barter.test/api/auth/reset-password" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"token\": \"beatae\",
    \"email\": \"fugit\",
    \"password\": \"neque\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://barter.test/api/auth/reset-password"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "token": "beatae",
    "email": "fugit",
    "password": "neque"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-auth-reset-password">
            <blockquote>
            <p>Example response (401, Email Does Not Exist):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;status&quot;: &quot;error&quot;,
    &quot;data&quot;: [],
    &quot;message&quot;: &quot;Token supplied is invalid&quot;,
    &quot;code&quot;: 404
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-auth-reset-password" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-auth-reset-password"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-reset-password"></code></pre>
</span>
<span id="execution-error-POSTapi-auth-reset-password" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-reset-password"></code></pre>
</span>
<form id="form-POSTapi-auth-reset-password" data-method="POST"
      data-path="api/auth/reset-password"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-reset-password', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-auth-reset-password"
                    onclick="tryItOut('POSTapi-auth-reset-password');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-auth-reset-password"
                    onclick="cancelTryOut('POSTapi-auth-reset-password');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-auth-reset-password" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/auth/reset-password</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="token"
               data-endpoint="POSTapi-auth-reset-password"
               value="beatae"
               data-component="body" hidden>
    <br>
<p>The token sent to the user.</p>
        </p>
                <p>
            <b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="email"
               data-endpoint="POSTapi-auth-reset-password"
               value="fugit"
               data-component="body" hidden>
    <br>
<p>The user email address.</p>
        </p>
                <p>
            <b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="password"
               data-endpoint="POSTapi-auth-reset-password"
               value="neque"
               data-component="body" hidden>
    <br>
<p>The the user new password.</p>
        </p>
        </form>

        <h1 id="post">Post</h1>

    

            <h2 id="post-GETapi-v1-posts">All Posts</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-posts">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://barter.test/api/v1/posts" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://barter.test/api/v1/posts"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-posts">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;data&quot;: {
        &quot;posts&quot;: [
            {
                &quot;id&quot;: &quot;&quot;,
                &quot;type&quot;: &quot;posts&quot;,
                &quot;attributes&quot;: {
                    &quot;author&quot;: &quot;James Bond&quot;,
                    &quot;title&quot;: &quot;Quod omnis sequi et enim veniam quas.&quot;,
                    &quot;description&quot;: &quot;Repellat sequi voluptas sit sint corrupti tempore.&quot;,
                    &quot;condition&quot;: &quot;Iure tempore vel dolorem ipsa est dicta et veniam.&quot;,
                    &quot;wishlist&quot;: null,
                    &quot;portfolio&quot;: null,
                    &quot;shoot_able&quot;: false,
                    &quot;status&quot;: &quot;&quot;,
                    &quot;category&quot;: &quot;GIVE&quot;,
                    &quot;country&quot;: &quot;Thailand&quot;,
                    &quot;state&quot;: &quot;South Solonview&quot;,
                    &quot;city&quot;: &quot;Estelleburgh&quot;,
                    &quot;location&quot;: &quot;en_NA&quot;,
                    &quot;published_at&quot;: &quot;2022-03-05T21:53:36.163062Z&quot;,
                    &quot;created_at&quot;: null,
                    &quot;updated_at&quot;: null,
                    &quot;images&quot;: []
                },
                &quot;relationships&quot;: {
                    &quot;comments&quot;: {
                        &quot;links&quot;: {
                            &quot;related&quot;: &quot;http://barter.test/api/v1/posts/0/comments&quot;
                        }
                    },
                    &quot;author&quot;: {
                        &quot;links&quot;: {
                            &quot;related&quot;: &quot;http://barter.test/api/v1/users/0&quot;
                        }
                    }
                },
                &quot;included&quot;: {
                    &quot;author&quot;: null
                },
                &quot;meta&quot;: {
                    &quot;comments_count&quot;: null
                }
            },
            {
                &quot;id&quot;: &quot;&quot;,
                &quot;type&quot;: &quot;posts&quot;,
                &quot;attributes&quot;: {
                    &quot;author&quot;: &quot;James Bond&quot;,
                    &quot;title&quot;: &quot;Omnis eos non perferendis et.&quot;,
                    &quot;description&quot;: &quot;Distinctio modi molestiae earum qui magni minima.&quot;,
                    &quot;condition&quot;: &quot;Qui qui est maxime sed.&quot;,
                    &quot;wishlist&quot;: null,
                    &quot;portfolio&quot;: null,
                    &quot;shoot_able&quot;: true,
                    &quot;status&quot;: &quot;&quot;,
                    &quot;category&quot;: &quot;SWAP ITEM&quot;,
                    &quot;country&quot;: &quot;Heard Island and McDonald Islands&quot;,
                    &quot;state&quot;: &quot;Port Earlene&quot;,
                    &quot;city&quot;: &quot;New Tyshawn&quot;,
                    &quot;location&quot;: &quot;ar_BH&quot;,
                    &quot;published_at&quot;: &quot;2022-03-05T21:53:36.168021Z&quot;,
                    &quot;created_at&quot;: null,
                    &quot;updated_at&quot;: null,
                    &quot;images&quot;: []
                },
                &quot;relationships&quot;: {
                    &quot;comments&quot;: {
                        &quot;links&quot;: {
                            &quot;related&quot;: &quot;http://barter.test/api/v1/posts/0/comments&quot;
                        }
                    },
                    &quot;author&quot;: {
                        &quot;links&quot;: {
                            &quot;related&quot;: &quot;http://barter.test/api/v1/users/0&quot;
                        }
                    }
                },
                &quot;included&quot;: {
                    &quot;author&quot;: null
                },
                &quot;meta&quot;: {
                    &quot;comments_count&quot;: null
                }
            }
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-posts" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-posts"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-posts"></code></pre>
</span>
<span id="execution-error-GETapi-v1-posts" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-posts"></code></pre>
</span>
<form id="form-GETapi-v1-posts" data-method="GET"
      data-path="api/v1/posts"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-posts', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-posts"
                    onclick="tryItOut('GETapi-v1-posts');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-posts"
                    onclick="cancelTryOut('GETapi-v1-posts');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-posts" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/posts</code></b>
        </p>
                <p>
            <label id="auth-GETapi-v1-posts" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-v1-posts"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="post-POSTapi-v1-posts">Create Post</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-v1-posts">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://barter.test/api/v1/posts" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"category\": \"quia\",
    \"description\": \"corporis\",
    \"condition\": \"dolores\",
    \"images\": [
        \"delectus\"
    ],
    \"wishlist\": [
        \"voluptatem\"
    ],
    \"portfolio\": \"deleniti\",
    \"shoot_able\": false,
    \"latitude\": 440442203.0685,
    \"longitude\": 1236.611637,
    \"location\": \"eligendi\",
    \"publish\": \"iusto\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://barter.test/api/v1/posts"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "category": "quia",
    "description": "corporis",
    "condition": "dolores",
    "images": [
        "delectus"
    ],
    "wishlist": [
        "voluptatem"
    ],
    "portfolio": "deleniti",
    "shoot_able": false,
    "latitude": 440442203.0685,
    "longitude": 1236.611637,
    "location": "eligendi",
    "publish": "iusto"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-posts">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;data&quot;: {
        &quot;id&quot;: &quot;&quot;,
        &quot;type&quot;: &quot;posts&quot;,
        &quot;attributes&quot;: {
            &quot;author&quot;: &quot;James Bond&quot;,
            &quot;title&quot;: &quot;Amet consequatur voluptas voluptatem.&quot;,
            &quot;description&quot;: &quot;Rerum consequuntur molestiae voluptas quisquam facere.&quot;,
            &quot;condition&quot;: &quot;Magnam non molestiae est cumque quis velit.&quot;,
            &quot;wishlist&quot;: null,
            &quot;portfolio&quot;: null,
            &quot;shoot_able&quot;: true,
            &quot;status&quot;: &quot;&quot;,
            &quot;category&quot;: &quot;SWAP SERVICE&quot;,
            &quot;country&quot;: &quot;Martinique&quot;,
            &quot;state&quot;: &quot;Sauerside&quot;,
            &quot;city&quot;: &quot;New Jettie&quot;,
            &quot;location&quot;: &quot;se_FI&quot;,
            &quot;published_at&quot;: &quot;2022-03-05T21:53:36.193629Z&quot;,
            &quot;created_at&quot;: null,
            &quot;updated_at&quot;: null,
            &quot;images&quot;: []
        },
        &quot;relationships&quot;: {
            &quot;comments&quot;: {
                &quot;links&quot;: {
                    &quot;related&quot;: &quot;http://barter.test/api/v1/posts/0/comments&quot;
                }
            },
            &quot;author&quot;: {
                &quot;links&quot;: {
                    &quot;related&quot;: &quot;http://barter.test/api/v1/users/0&quot;
                }
            }
        },
        &quot;included&quot;: {
            &quot;author&quot;: null
        },
        &quot;meta&quot;: {
            &quot;comments_count&quot;: null
        }
    }
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-posts" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-posts"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-posts"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-posts" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-posts"></code></pre>
</span>
<form id="form-POSTapi-v1-posts" data-method="POST"
      data-path="api/v1/posts"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-posts', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-posts"
                    onclick="tryItOut('POSTapi-v1-posts');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-posts"
                    onclick="cancelTryOut('POSTapi-v1-posts');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-posts" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/posts</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-v1-posts" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-v1-posts"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>category</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="category"
               data-endpoint="POSTapi-v1-posts"
               value="quia"
               data-component="body" hidden>
    <br>
<p>The post category slug.</p>
        </p>
                <p>
            <b><code>description</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="description"
               data-endpoint="POSTapi-v1-posts"
               value="corporis"
               data-component="body" hidden>
    <br>
<p>The post description.</p>
        </p>
                <p>
            <b><code>condition</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="condition"
               data-endpoint="POSTapi-v1-posts"
               value="dolores"
               data-component="body" hidden>
    <br>
<p>The the post or item condition.</p>
        </p>
                <p>
            <b><code>images</code></b>&nbsp;&nbsp;<small>string[]</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="images[0]"
               data-endpoint="POSTapi-v1-posts"
               data-component="body" hidden>
        <input type="text"
               name="images[1]"
               data-endpoint="POSTapi-v1-posts"
               data-component="body" hidden>
    <br>
<p>The post images.</p>
        </p>
                <p>
            <b><code>wishlist</code></b>&nbsp;&nbsp;<small>string[]</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="wishlist[0]"
               data-endpoint="POSTapi-v1-posts"
               data-component="body" hidden>
        <input type="text"
               name="wishlist[1]"
               data-endpoint="POSTapi-v1-posts"
               data-component="body" hidden>
    <br>
<p>The post wishlist.</p>
        </p>
                <p>
            <b><code>portfolio</code></b>&nbsp;&nbsp;<small>url</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="portfolio"
               data-endpoint="POSTapi-v1-posts"
               value="deleniti"
               data-component="body" hidden>
    <br>
<p>The user posting profile</p>
        </p>
                <p>
            <b><code>shoot_able</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
                <label data-endpoint="POSTapi-v1-posts" hidden>
            <input type="radio" name="shoot_able"
                   value="true"
                   data-endpoint="POSTapi-v1-posts"
                   data-component="body"
            >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-v1-posts" hidden>
            <input type="radio" name="shoot_able"
                   value="false"
                   data-endpoint="POSTapi-v1-posts"
                   data-component="body"
            >
            <code>false</code>
        </label>
    <br>
<p>this is to indicate users can shoot the post</p>
        </p>
                <p>
            <b><code>latitude</code></b>&nbsp;&nbsp;<small>number</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="latitude"
               data-endpoint="POSTapi-v1-posts"
               value="440442203.0685"
               data-component="body" hidden>
    <br>
<p>This is used to capture the user Location latitude</p>
        </p>
                <p>
            <b><code>longitude</code></b>&nbsp;&nbsp;<small>number</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="longitude"
               data-endpoint="POSTapi-v1-posts"
               value="1236.611637"
               data-component="body" hidden>
    <br>
<p>This is used to capture the user location longitude</p>
        </p>
                <p>
            <b><code>location</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="location"
               data-endpoint="POSTapi-v1-posts"
               value="eligendi"
               data-component="body" hidden>
    <br>
<p>The post location.</p>
        </p>
                <p>
            <b><code>publish</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="publish"
               data-endpoint="POSTapi-v1-posts"
               value="iusto"
               data-component="body" hidden>
    <br>
<p>The is is used to state wether the post should be published. Example yes</p>
        </p>
        </form>

            <h2 id="post-GETapi-v1-posts--id-">Show Post</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-posts--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://barter.test/api/v1/posts/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://barter.test/api/v1/posts/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-posts--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;data&quot;: {
        &quot;id&quot;: &quot;&quot;,
        &quot;type&quot;: &quot;posts&quot;,
        &quot;attributes&quot;: {
            &quot;author&quot;: &quot;James Bond&quot;,
            &quot;title&quot;: &quot;Repellendus quia ut praesentium sit dolores.&quot;,
            &quot;description&quot;: &quot;Hic non deleniti ullam ut tenetur quaerat necessitatibus.&quot;,
            &quot;condition&quot;: &quot;Quis fugit ut nemo at nostrum ipsam.&quot;,
            &quot;wishlist&quot;: null,
            &quot;portfolio&quot;: null,
            &quot;shoot_able&quot;: false,
            &quot;status&quot;: &quot;&quot;,
            &quot;category&quot;: &quot;SWAP SERVICE&quot;,
            &quot;country&quot;: &quot;Slovenia&quot;,
            &quot;state&quot;: &quot;Leopoldland&quot;,
            &quot;city&quot;: &quot;Terryshire&quot;,
            &quot;location&quot;: &quot;en_US&quot;,
            &quot;published_at&quot;: &quot;2022-03-05T21:53:36.200013Z&quot;,
            &quot;created_at&quot;: null,
            &quot;updated_at&quot;: null,
            &quot;images&quot;: []
        },
        &quot;relationships&quot;: {
            &quot;comments&quot;: {
                &quot;links&quot;: {
                    &quot;related&quot;: &quot;http://barter.test/api/v1/posts/0/comments&quot;
                }
            },
            &quot;author&quot;: {
                &quot;links&quot;: {
                    &quot;related&quot;: &quot;http://barter.test/api/v1/users/0&quot;
                }
            }
        },
        &quot;included&quot;: {
            &quot;author&quot;: null
        },
        &quot;meta&quot;: {
            &quot;comments_count&quot;: null
        }
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-posts--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-posts--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-posts--id-"></code></pre>
</span>
<span id="execution-error-GETapi-v1-posts--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-posts--id-"></code></pre>
</span>
<form id="form-GETapi-v1-posts--id-" data-method="GET"
      data-path="api/v1/posts/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-posts--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-posts--id-"
                    onclick="tryItOut('GETapi-v1-posts--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-posts--id-"
                    onclick="cancelTryOut('GETapi-v1-posts--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-posts--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/posts/{id}</code></b>
        </p>
                <p>
            <label id="auth-GETapi-v1-posts--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-v1-posts--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="GETapi-v1-posts--id-"
               value="1"
               data-component="url" hidden>
    <br>
<p>The ID of the post.</p>
            </p>
                    </form>

            <h2 id="post-DELETEapi-v1-posts--id-">Delete Post</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-v1-posts--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://barter.test/api/v1/posts/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://barter.test/api/v1/posts/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-v1-posts--id-">
</span>
<span id="execution-results-DELETEapi-v1-posts--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-v1-posts--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-v1-posts--id-"></code></pre>
</span>
<span id="execution-error-DELETEapi-v1-posts--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-v1-posts--id-"></code></pre>
</span>
<form id="form-DELETEapi-v1-posts--id-" data-method="DELETE"
      data-path="api/v1/posts/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-v1-posts--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-v1-posts--id-"
                    onclick="tryItOut('DELETEapi-v1-posts--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-v1-posts--id-"
                    onclick="cancelTryOut('DELETEapi-v1-posts--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-v1-posts--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/v1/posts/{id}</code></b>
        </p>
                <p>
            <label id="auth-DELETEapi-v1-posts--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="DELETEapi-v1-posts--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="DELETEapi-v1-posts--id-"
               value="1"
               data-component="url" hidden>
    <br>
<p>The ID of the post.</p>
            </p>
                    </form>

            <h2 id="post-PATCHapi-v1-posts--id-">Update Post</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PATCHapi-v1-posts--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PATCH \
    "http://barter.test/api/v1/posts/1" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "category=sed" \
    --form "description=lkkotdchiyslrlvgbadjkxbblbvdedczofkilnrgsgcxiihsytmfpqrpudsujqwkdfkseizrypxxavlquifpehwkqtodldqjovbanknvagjweyakqsbfhoedvzcwfggtsyapxldutzygwnhqjgkxyzcppjqpsaooeppnwkwsxoaitiyvypdmhdxjnrugajqreyxtksahe" \
    --form "condition=owzhgnhujdkqkhgaiawhfao" \
    --form "wishlist=y" \
    --form "portfolio=http://www.dooley.org/expedita-voluptas-iusto-ut-tempore-culpa-qui-repellat-aut.html" \
    --form "shoot_able=" \
    --form "latitude=-25" \
    --form "longitude=122" \
    --form "location=omnis" \
    --form "publish=non" \
    --form "images[]=@/tmp/php9N5YlZ" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://barter.test/api/v1/posts/1"
);

const headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('category', 'sed');
body.append('description', 'lkkotdchiyslrlvgbadjkxbblbvdedczofkilnrgsgcxiihsytmfpqrpudsujqwkdfkseizrypxxavlquifpehwkqtodldqjovbanknvagjweyakqsbfhoedvzcwfggtsyapxldutzygwnhqjgkxyzcppjqpsaooeppnwkwsxoaitiyvypdmhdxjnrugajqreyxtksahe');
body.append('condition', 'owzhgnhujdkqkhgaiawhfao');
body.append('wishlist', 'y');
body.append('portfolio', 'http://www.dooley.org/expedita-voluptas-iusto-ut-tempore-culpa-qui-repellat-aut.html');
body.append('shoot_able', '');
body.append('latitude', '-25');
body.append('longitude', '122');
body.append('location', 'omnis');
body.append('publish', 'non');
body.append('images[]', document.querySelector('input[name="images[]"]').files[0]);

fetch(url, {
    method: "PATCH",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PATCHapi-v1-posts--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;data&quot;: {
        &quot;id&quot;: &quot;&quot;,
        &quot;type&quot;: &quot;posts&quot;,
        &quot;attributes&quot;: {
            &quot;author&quot;: &quot;James Bond&quot;,
            &quot;title&quot;: &quot;Molestiae ipsa neque ut minus eum sed.&quot;,
            &quot;description&quot;: &quot;Eveniet accusamus perspiciatis sit est vel quaerat.&quot;,
            &quot;condition&quot;: &quot;Non cumque facere ab odit repellendus corporis dolorem.&quot;,
            &quot;wishlist&quot;: null,
            &quot;portfolio&quot;: null,
            &quot;shoot_able&quot;: false,
            &quot;status&quot;: &quot;&quot;,
            &quot;category&quot;: &quot;SWAP ITEM&quot;,
            &quot;country&quot;: &quot;Latvia&quot;,
            &quot;state&quot;: &quot;Port Dorothytown&quot;,
            &quot;city&quot;: &quot;Anyastad&quot;,
            &quot;location&quot;: &quot;mt_MT&quot;,
            &quot;published_at&quot;: &quot;2022-03-05T21:53:36.212957Z&quot;,
            &quot;created_at&quot;: null,
            &quot;updated_at&quot;: null,
            &quot;images&quot;: []
        },
        &quot;relationships&quot;: {
            &quot;comments&quot;: {
                &quot;links&quot;: {
                    &quot;related&quot;: &quot;http://barter.test/api/v1/posts/0/comments&quot;
                }
            },
            &quot;author&quot;: {
                &quot;links&quot;: {
                    &quot;related&quot;: &quot;http://barter.test/api/v1/users/0&quot;
                }
            }
        },
        &quot;included&quot;: {
            &quot;author&quot;: null
        },
        &quot;meta&quot;: {
            &quot;comments_count&quot;: null
        }
    }
}</code>
 </pre>
    </span>
<span id="execution-results-PATCHapi-v1-posts--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PATCHapi-v1-posts--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PATCHapi-v1-posts--id-"></code></pre>
</span>
<span id="execution-error-PATCHapi-v1-posts--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHapi-v1-posts--id-"></code></pre>
</span>
<form id="form-PATCHapi-v1-posts--id-" data-method="PATCH"
      data-path="api/v1/posts/{id}"
      data-authed="1"
      data-hasfiles="1"
      data-isarraybody="0"
      data-headers='{"Content-Type":"multipart\/form-data","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PATCHapi-v1-posts--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PATCHapi-v1-posts--id-"
                    onclick="tryItOut('PATCHapi-v1-posts--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PATCHapi-v1-posts--id-"
                    onclick="cancelTryOut('PATCHapi-v1-posts--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PATCHapi-v1-posts--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/v1/posts/{id}</code></b>
        </p>
                <p>
            <label id="auth-PATCHapi-v1-posts--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="PATCHapi-v1-posts--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="PATCHapi-v1-posts--id-"
               value="1"
               data-component="url" hidden>
    <br>
<p>The ID of the post.</p>
            </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>category</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="category"
               data-endpoint="PATCHapi-v1-posts--id-"
               value="sed"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>description</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="description"
               data-endpoint="PATCHapi-v1-posts--id-"
               value="lkkotdchiyslrlvgbadjkxbblbvdedczofkilnrgsgcxiihsytmfpqrpudsujqwkdfkseizrypxxavlquifpehwkqtodldqjovbanknvagjweyakqsbfhoedvzcwfggtsyapxldutzygwnhqjgkxyzcppjqpsaooeppnwkwsxoaitiyvypdmhdxjnrugajqreyxtksahe"
               data-component="body" hidden>
    <br>
<p>Must not be greater than 255 characters.</p>
        </p>
                <p>
            <b><code>condition</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="condition"
               data-endpoint="PATCHapi-v1-posts--id-"
               value="owzhgnhujdkqkhgaiawhfao"
               data-component="body" hidden>
    <br>
<p>Must not be greater than 255 characters.</p>
        </p>
                <p>
            <b><code>images</code></b>&nbsp;&nbsp;<small>file[]</small>     <i>optional</i> &nbsp;
                <input type="file"
               name="images[0]"
               data-endpoint="PATCHapi-v1-posts--id-"
               data-component="body" hidden>
        <input type="file"
               name="images[1]"
               data-endpoint="PATCHapi-v1-posts--id-"
               data-component="body" hidden>
    <br>
<p>Must be an image. Must not be greater than 2048 kilobytes.</p>
        </p>
                <p>
            <b><code>wishlist</code></b>&nbsp;&nbsp;<small>string[]</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="wishlist[0]"
               data-endpoint="PATCHapi-v1-posts--id-"
               data-component="body" hidden>
        <input type="text"
               name="wishlist[1]"
               data-endpoint="PATCHapi-v1-posts--id-"
               data-component="body" hidden>
    <br>
<p>Must not have more than 4 items.</p>
        </p>
                <p>
            <b><code>portfolio</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="portfolio"
               data-endpoint="PATCHapi-v1-posts--id-"
               value="http://www.dooley.org/expedita-voluptas-iusto-ut-tempore-culpa-qui-repellat-aut.html"
               data-component="body" hidden>
    <br>
<p>Must be a valid URL.</p>
        </p>
                <p>
            <b><code>shoot_able</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
                <label data-endpoint="PATCHapi-v1-posts--id-" hidden>
            <input type="radio" name="shoot_able"
                   value="true"
                   data-endpoint="PATCHapi-v1-posts--id-"
                   data-component="body"
            >
            <code>true</code>
        </label>
        <label data-endpoint="PATCHapi-v1-posts--id-" hidden>
            <input type="radio" name="shoot_able"
                   value="false"
                   data-endpoint="PATCHapi-v1-posts--id-"
                   data-component="body"
            >
            <code>false</code>
        </label>
    <br>

        </p>
                <p>
            <b><code>latitude</code></b>&nbsp;&nbsp;<small>number</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="latitude"
               data-endpoint="PATCHapi-v1-posts--id-"
               value="-25"
               data-component="body" hidden>
    <br>
<p>Must be between -90 and 90.</p>
        </p>
                <p>
            <b><code>longitude</code></b>&nbsp;&nbsp;<small>number</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="longitude"
               data-endpoint="PATCHapi-v1-posts--id-"
               value="122"
               data-component="body" hidden>
    <br>
<p>Must be between -180 and 180.</p>
        </p>
                <p>
            <b><code>location</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="location"
               data-endpoint="PATCHapi-v1-posts--id-"
               value="omnis"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>publish</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="publish"
               data-endpoint="PATCHapi-v1-posts--id-"
               value="non"
               data-component="body" hidden>
    <br>

        </p>
        </form>

        <h1 id="post-categories">Post Categories</h1>

    <p>API endpoints for Post Categories</p>

            <h2 id="post-categories-GETapi-v1-categories">Display a listing of the resource.</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-categories">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://barter.test/api/v1/categories" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://barter.test/api/v1/categories"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-categories">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: ://barter.test:
access-control-allow-credentials: true
access-control-allow-methods: POST, GET, OPTIONS, PUT, DELETE, PATCH
access-control-allow-headers: X-Requested-With, Content-Type, Origin, Authorization
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;status&quot;: &quot;error&quot;,
    &quot;data&quot;: [],
    &quot;message&quot;: &quot;Unauthenticated.&quot;,
    &quot;code&quot;: 10
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-categories" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-categories"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-categories"></code></pre>
</span>
<span id="execution-error-GETapi-v1-categories" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-categories"></code></pre>
</span>
<form id="form-GETapi-v1-categories" data-method="GET"
      data-path="api/v1/categories"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-categories', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-categories"
                    onclick="tryItOut('GETapi-v1-categories');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-categories"
                    onclick="cancelTryOut('GETapi-v1-categories');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-categories" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/categories</code></b>
        </p>
                    </form>

        <h1 id="search-post">Search Post</h1>

    

            <h2 id="search-post-GETapi-v1-search">Search Through All Posts</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-search">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://barter.test/api/v1/search?page[number]=4&amp;page[size]=10&amp;filter[description]=qui&amp;filter[condition]=voluptate&amp;filter[location]=dicta" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://barter.test/api/v1/search"
);

const params = {
    "page[number]": "4",
    "page[size]": "10",
    "filter[description]": "qui",
    "filter[condition]": "voluptate",
    "filter[location]": "dicta",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-search">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;data&quot;: {
        &quot;posts&quot;: [
            {
                &quot;id&quot;: &quot;&quot;,
                &quot;type&quot;: &quot;posts&quot;,
                &quot;attributes&quot;: {
                    &quot;author&quot;: &quot;James Bond&quot;,
                    &quot;title&quot;: &quot;Dolores distinctio veniam architecto.&quot;,
                    &quot;description&quot;: &quot;Consectetur aliquid sapiente laudantium sunt ut eaque.&quot;,
                    &quot;condition&quot;: &quot;Quasi expedita iste nihil.&quot;,
                    &quot;wishlist&quot;: null,
                    &quot;portfolio&quot;: null,
                    &quot;shoot_able&quot;: true,
                    &quot;status&quot;: &quot;&quot;,
                    &quot;category&quot;: &quot;GIVE&quot;,
                    &quot;country&quot;: &quot;Mauritania&quot;,
                    &quot;state&quot;: &quot;West June&quot;,
                    &quot;city&quot;: &quot;Everettport&quot;,
                    &quot;location&quot;: &quot;fr_BE&quot;,
                    &quot;published_at&quot;: &quot;2022-03-05T21:53:43.555527Z&quot;,
                    &quot;created_at&quot;: null,
                    &quot;updated_at&quot;: null,
                    &quot;images&quot;: []
                },
                &quot;relationships&quot;: {
                    &quot;comments&quot;: {
                        &quot;links&quot;: {
                            &quot;related&quot;: &quot;http://barter.test/api/v1/posts/0/comments&quot;
                        }
                    },
                    &quot;author&quot;: {
                        &quot;links&quot;: {
                            &quot;related&quot;: &quot;http://barter.test/api/v1/users/0&quot;
                        }
                    }
                },
                &quot;included&quot;: {
                    &quot;author&quot;: null
                },
                &quot;meta&quot;: {
                    &quot;comments_count&quot;: null
                }
            },
            {
                &quot;id&quot;: &quot;&quot;,
                &quot;type&quot;: &quot;posts&quot;,
                &quot;attributes&quot;: {
                    &quot;author&quot;: &quot;James Bond&quot;,
                    &quot;title&quot;: &quot;Aspernatur minima aliquid eius unde ab.&quot;,
                    &quot;description&quot;: &quot;Rem officia provident et consequuntur voluptatem.&quot;,
                    &quot;condition&quot;: &quot;Cumque ipsum esse maxime eveniet.&quot;,
                    &quot;wishlist&quot;: null,
                    &quot;portfolio&quot;: null,
                    &quot;shoot_able&quot;: true,
                    &quot;status&quot;: &quot;&quot;,
                    &quot;category&quot;: &quot;GIVE&quot;,
                    &quot;country&quot;: &quot;Poland&quot;,
                    &quot;state&quot;: &quot;New Reymundoburgh&quot;,
                    &quot;city&quot;: &quot;Bashirianport&quot;,
                    &quot;location&quot;: &quot;en_MP&quot;,
                    &quot;published_at&quot;: &quot;2022-03-05T21:53:43.557792Z&quot;,
                    &quot;created_at&quot;: null,
                    &quot;updated_at&quot;: null,
                    &quot;images&quot;: []
                },
                &quot;relationships&quot;: {
                    &quot;comments&quot;: {
                        &quot;links&quot;: {
                            &quot;related&quot;: &quot;http://barter.test/api/v1/posts/0/comments&quot;
                        }
                    },
                    &quot;author&quot;: {
                        &quot;links&quot;: {
                            &quot;related&quot;: &quot;http://barter.test/api/v1/users/0&quot;
                        }
                    }
                },
                &quot;included&quot;: {
                    &quot;author&quot;: null
                },
                &quot;meta&quot;: {
                    &quot;comments_count&quot;: null
                }
            }
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-search" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-search"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-search"></code></pre>
</span>
<span id="execution-error-GETapi-v1-search" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-search"></code></pre>
</span>
<form id="form-GETapi-v1-search" data-method="GET"
      data-path="api/v1/search"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-search', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-search"
                    onclick="tryItOut('GETapi-v1-search');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-search"
                    onclick="cancelTryOut('GETapi-v1-search');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-search" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/search</code></b>
        </p>
                <p>
            <label id="auth-GETapi-v1-search" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-v1-search"
                                                                data-component="header"></label>
        </p>
                    <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>page[number]</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="page[number]"
               data-endpoint="GETapi-v1-search"
               value="4"
               data-component="query" hidden>
    <br>
<p>The page number.</p>
            </p>
                    <p>
                <b><code>page[size]</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="page[size]"
               data-endpoint="GETapi-v1-search"
               value="10"
               data-component="query" hidden>
    <br>
<p>The page number.</p>
            </p>
                    <p>
                <b><code>filter[description]</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="filter[description]"
               data-endpoint="GETapi-v1-search"
               value="qui"
               data-component="query" hidden>
    <br>
<p>The description string</p>
            </p>
                    <p>
                <b><code>filter[condition]</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="filter[condition]"
               data-endpoint="GETapi-v1-search"
               value="voluptate"
               data-component="query" hidden>
    <br>
<p>The condition string</p>
            </p>
                    <p>
                <b><code>filter[location]</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="filter[location]"
               data-endpoint="GETapi-v1-search"
               value="dicta"
               data-component="query" hidden>
    <br>
<p>The location name</p>
            </p>
                </form>

        <h1 id="shot">Shot</h1>

    

            <h2 id="shot-GETapi-v1-posts--post_id--shots">All Shots</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-posts--post_id--shots">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://barter.test/api/v1/posts/5/shots" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://barter.test/api/v1/posts/5/shots"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-posts--post_id--shots">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;data&quot;: {
        &quot;shots&quot;: [
            {
                &quot;id&quot;: &quot;&quot;,
                &quot;type&quot;: &quot;shots&quot;,
                &quot;attributes&quot;: {
                    &quot;description&quot;: null,
                    &quot;condition&quot;: null,
                    &quot;created_at&quot;: &quot;2022-03-05 21:03:53&quot;,
                    &quot;updated_at&quot;: &quot;2022-03-05 21:03:53&quot;,
                    &quot;images&quot;: []
                },
                &quot;relationships&quot;: {
                    &quot;post&quot;: {
                        &quot;links&quot;: {
                            &quot;related&quot;: &quot;http://barter.test/api/v1/posts/0&quot;
                        }
                    },
                    &quot;shooter&quot;: {
                        &quot;links&quot;: {
                            &quot;related&quot;: &quot;http://barter.test/api/v1/users/0&quot;
                        }
                    }
                },
                &quot;included&quot;: {
                    &quot;shooter&quot;: null,
                    &quot;post&quot;: null
                }
            },
            {
                &quot;id&quot;: &quot;&quot;,
                &quot;type&quot;: &quot;shots&quot;,
                &quot;attributes&quot;: {
                    &quot;description&quot;: null,
                    &quot;condition&quot;: null,
                    &quot;created_at&quot;: &quot;2022-03-05 21:03:53&quot;,
                    &quot;updated_at&quot;: &quot;2022-03-05 21:03:53&quot;,
                    &quot;images&quot;: []
                },
                &quot;relationships&quot;: {
                    &quot;post&quot;: {
                        &quot;links&quot;: {
                            &quot;related&quot;: &quot;http://barter.test/api/v1/posts/0&quot;
                        }
                    },
                    &quot;shooter&quot;: {
                        &quot;links&quot;: {
                            &quot;related&quot;: &quot;http://barter.test/api/v1/users/0&quot;
                        }
                    }
                },
                &quot;included&quot;: {
                    &quot;shooter&quot;: null,
                    &quot;post&quot;: null
                }
            }
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-posts--post_id--shots" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-posts--post_id--shots"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-posts--post_id--shots"></code></pre>
</span>
<span id="execution-error-GETapi-v1-posts--post_id--shots" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-posts--post_id--shots"></code></pre>
</span>
<form id="form-GETapi-v1-posts--post_id--shots" data-method="GET"
      data-path="api/v1/posts/{post_id}/shots"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-posts--post_id--shots', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-posts--post_id--shots"
                    onclick="tryItOut('GETapi-v1-posts--post_id--shots');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-posts--post_id--shots"
                    onclick="cancelTryOut('GETapi-v1-posts--post_id--shots');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-posts--post_id--shots" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/posts/{post_id}/shots</code></b>
        </p>
                <p>
            <label id="auth-GETapi-v1-posts--post_id--shots" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-v1-posts--post_id--shots"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>post_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="post_id"
               data-endpoint="GETapi-v1-posts--post_id--shots"
               value="5"
               data-component="url" hidden>
    <br>
<p>The ID of the post.</p>
            </p>
                    </form>

            <h2 id="shot-GETapi-v1-users--user--shots">All User Shots</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-users--user--shots">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://barter.test/api/v1/users/1/shots" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://barter.test/api/v1/users/1/shots"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-users--user--shots">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;data&quot;: {
        &quot;shots&quot;: [
            {
                &quot;id&quot;: &quot;&quot;,
                &quot;type&quot;: &quot;shots&quot;,
                &quot;attributes&quot;: {
                    &quot;description&quot;: null,
                    &quot;condition&quot;: null,
                    &quot;created_at&quot;: &quot;2022-03-05 21:03:53&quot;,
                    &quot;updated_at&quot;: &quot;2022-03-05 21:03:53&quot;,
                    &quot;images&quot;: []
                },
                &quot;relationships&quot;: {
                    &quot;post&quot;: {
                        &quot;links&quot;: {
                            &quot;related&quot;: &quot;http://barter.test/api/v1/posts/0&quot;
                        }
                    },
                    &quot;shooter&quot;: {
                        &quot;links&quot;: {
                            &quot;related&quot;: &quot;http://barter.test/api/v1/users/0&quot;
                        }
                    }
                },
                &quot;included&quot;: {
                    &quot;shooter&quot;: null,
                    &quot;post&quot;: null
                }
            },
            {
                &quot;id&quot;: &quot;&quot;,
                &quot;type&quot;: &quot;shots&quot;,
                &quot;attributes&quot;: {
                    &quot;description&quot;: null,
                    &quot;condition&quot;: null,
                    &quot;created_at&quot;: &quot;2022-03-05 21:03:53&quot;,
                    &quot;updated_at&quot;: &quot;2022-03-05 21:03:53&quot;,
                    &quot;images&quot;: []
                },
                &quot;relationships&quot;: {
                    &quot;post&quot;: {
                        &quot;links&quot;: {
                            &quot;related&quot;: &quot;http://barter.test/api/v1/posts/0&quot;
                        }
                    },
                    &quot;shooter&quot;: {
                        &quot;links&quot;: {
                            &quot;related&quot;: &quot;http://barter.test/api/v1/users/0&quot;
                        }
                    }
                },
                &quot;included&quot;: {
                    &quot;shooter&quot;: null,
                    &quot;post&quot;: null
                }
            }
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-users--user--shots" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-users--user--shots"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-users--user--shots"></code></pre>
</span>
<span id="execution-error-GETapi-v1-users--user--shots" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-users--user--shots"></code></pre>
</span>
<form id="form-GETapi-v1-users--user--shots" data-method="GET"
      data-path="api/v1/users/{user}/shots"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-users--user--shots', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-users--user--shots"
                    onclick="tryItOut('GETapi-v1-users--user--shots');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-users--user--shots"
                    onclick="cancelTryOut('GETapi-v1-users--user--shots');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-users--user--shots" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/users/{user}/shots</code></b>
        </p>
                <p>
            <label id="auth-GETapi-v1-users--user--shots" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-v1-users--user--shots"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>user</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="user"
               data-endpoint="GETapi-v1-users--user--shots"
               value="1"
               data-component="url" hidden>
    <br>

            </p>
                    </form>

            <h2 id="shot-GETapi-v1-posts--post_id--shots--id-">Show Shot</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-posts--post_id--shots--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://barter.test/api/v1/posts/12/shots/13" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://barter.test/api/v1/posts/12/shots/13"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-posts--post_id--shots--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;data&quot;: {
        &quot;id&quot;: &quot;&quot;,
        &quot;type&quot;: &quot;shots&quot;,
        &quot;attributes&quot;: {
            &quot;description&quot;: null,
            &quot;condition&quot;: null,
            &quot;created_at&quot;: &quot;2022-03-05 21:03:53&quot;,
            &quot;updated_at&quot;: &quot;2022-03-05 21:03:53&quot;,
            &quot;images&quot;: []
        },
        &quot;relationships&quot;: {
            &quot;post&quot;: {
                &quot;links&quot;: {
                    &quot;related&quot;: &quot;http://barter.test/api/v1/posts/0&quot;
                }
            },
            &quot;shooter&quot;: {
                &quot;links&quot;: {
                    &quot;related&quot;: &quot;http://barter.test/api/v1/users/0&quot;
                }
            }
        },
        &quot;included&quot;: {
            &quot;shooter&quot;: null,
            &quot;post&quot;: null
        }
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-posts--post_id--shots--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-posts--post_id--shots--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-posts--post_id--shots--id-"></code></pre>
</span>
<span id="execution-error-GETapi-v1-posts--post_id--shots--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-posts--post_id--shots--id-"></code></pre>
</span>
<form id="form-GETapi-v1-posts--post_id--shots--id-" data-method="GET"
      data-path="api/v1/posts/{post_id}/shots/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-posts--post_id--shots--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-posts--post_id--shots--id-"
                    onclick="tryItOut('GETapi-v1-posts--post_id--shots--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-posts--post_id--shots--id-"
                    onclick="cancelTryOut('GETapi-v1-posts--post_id--shots--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-posts--post_id--shots--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/posts/{post_id}/shots/{id}</code></b>
        </p>
                <p>
            <label id="auth-GETapi-v1-posts--post_id--shots--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-v1-posts--post_id--shots--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>post_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="post_id"
               data-endpoint="GETapi-v1-posts--post_id--shots--id-"
               value="12"
               data-component="url" hidden>
    <br>
<p>The ID of the post.</p>
            </p>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="GETapi-v1-posts--post_id--shots--id-"
               value="13"
               data-component="url" hidden>
    <br>
<p>The ID of the shot.</p>
            </p>
                    </form>

            <h2 id="shot-POSTapi-v1-posts--post--shots">Create Shot</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-v1-posts--post--shots">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://barter.test/api/v1/posts/1/shots" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"description\": \"officiis\",
    \"condition\": \"commodi\",
    \"images\": [
        \"laborum\"
    ]
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://barter.test/api/v1/posts/1/shots"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "description": "officiis",
    "condition": "commodi",
    "images": [
        "laborum"
    ]
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-posts--post--shots">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;data&quot;: {
        &quot;id&quot;: &quot;&quot;,
        &quot;type&quot;: &quot;shots&quot;,
        &quot;attributes&quot;: {
            &quot;description&quot;: null,
            &quot;condition&quot;: null,
            &quot;created_at&quot;: &quot;2022-03-05 21:03:53&quot;,
            &quot;updated_at&quot;: &quot;2022-03-05 21:03:53&quot;,
            &quot;images&quot;: []
        },
        &quot;relationships&quot;: {
            &quot;post&quot;: {
                &quot;links&quot;: {
                    &quot;related&quot;: &quot;http://barter.test/api/v1/posts/0&quot;
                }
            },
            &quot;shooter&quot;: {
                &quot;links&quot;: {
                    &quot;related&quot;: &quot;http://barter.test/api/v1/users/0&quot;
                }
            }
        },
        &quot;included&quot;: {
            &quot;shooter&quot;: null,
            &quot;post&quot;: null
        }
    }
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-posts--post--shots" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-posts--post--shots"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-posts--post--shots"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-posts--post--shots" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-posts--post--shots"></code></pre>
</span>
<form id="form-POSTapi-v1-posts--post--shots" data-method="POST"
      data-path="api/v1/posts/{post}/shots"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-posts--post--shots', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-posts--post--shots"
                    onclick="tryItOut('POSTapi-v1-posts--post--shots');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-posts--post--shots"
                    onclick="cancelTryOut('POSTapi-v1-posts--post--shots');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-posts--post--shots" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/posts/{post}/shots</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-v1-posts--post--shots" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-v1-posts--post--shots"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>post</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="post"
               data-endpoint="POSTapi-v1-posts--post--shots"
               value="1"
               data-component="url" hidden>
    <br>

            </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>description</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="description"
               data-endpoint="POSTapi-v1-posts--post--shots"
               value="officiis"
               data-component="body" hidden>
    <br>
<p>The shot description.</p>
        </p>
                <p>
            <b><code>condition</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="condition"
               data-endpoint="POSTapi-v1-posts--post--shots"
               value="commodi"
               data-component="body" hidden>
    <br>
<p>The the shot or item condition.</p>
        </p>
                <p>
            <b><code>images</code></b>&nbsp;&nbsp;<small>string[]</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="images[0]"
               data-endpoint="POSTapi-v1-posts--post--shots"
               data-component="body" hidden>
        <input type="text"
               name="images[1]"
               data-endpoint="POSTapi-v1-posts--post--shots"
               data-component="body" hidden>
    <br>
<p>The shot images.</p>
        </p>
        </form>

        <h1 id="shot-acceptance">Shot Acceptance</h1>

    

            <h2 id="shot-acceptance-PATCHapi-v1-shots--shot--posts--post--accept">Accept Shot</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint is used for accepting shot by a post creator.</p>

<span id="example-requests-PATCHapi-v1-shots--shot--posts--post--accept">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PATCH \
    "http://barter.test/api/v1/shots/1/posts/19/accept" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://barter.test/api/v1/shots/1/posts/19/accept"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PATCH",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PATCHapi-v1-shots--shot--posts--post--accept">
</span>
<span id="execution-results-PATCHapi-v1-shots--shot--posts--post--accept" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PATCHapi-v1-shots--shot--posts--post--accept"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PATCHapi-v1-shots--shot--posts--post--accept"></code></pre>
</span>
<span id="execution-error-PATCHapi-v1-shots--shot--posts--post--accept" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHapi-v1-shots--shot--posts--post--accept"></code></pre>
</span>
<form id="form-PATCHapi-v1-shots--shot--posts--post--accept" data-method="PATCH"
      data-path="api/v1/shots/{shot}/posts/{post}/accept"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PATCHapi-v1-shots--shot--posts--post--accept', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PATCHapi-v1-shots--shot--posts--post--accept"
                    onclick="tryItOut('PATCHapi-v1-shots--shot--posts--post--accept');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PATCHapi-v1-shots--shot--posts--post--accept"
                    onclick="cancelTryOut('PATCHapi-v1-shots--shot--posts--post--accept');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PATCHapi-v1-shots--shot--posts--post--accept" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/v1/shots/{shot}/posts/{post}/accept</code></b>
        </p>
                <p>
            <label id="auth-PATCHapi-v1-shots--shot--posts--post--accept" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="PATCHapi-v1-shots--shot--posts--post--accept"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>shot</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="shot"
               data-endpoint="PATCHapi-v1-shots--shot--posts--post--accept"
               value="1"
               data-component="url" hidden>
    <br>
<p>the shot been accepted ID</p>
            </p>
                    <p>
                <b><code>post</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="post"
               data-endpoint="PATCHapi-v1-shots--shot--posts--post--accept"
               value="19"
               data-component="url" hidden>
    <br>
<p>the post ID</p>
            </p>
                    </form>

            <h2 id="shot-acceptance-PATCHapi-v1-shots--shot--posts--post--decline">Decline Shot</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint is used for accepting shot by a post creator.</p>

<span id="example-requests-PATCHapi-v1-shots--shot--posts--post--decline">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PATCH \
    "http://barter.test/api/v1/shots/11/posts/6/decline" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://barter.test/api/v1/shots/11/posts/6/decline"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PATCH",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PATCHapi-v1-shots--shot--posts--post--decline">
</span>
<span id="execution-results-PATCHapi-v1-shots--shot--posts--post--decline" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PATCHapi-v1-shots--shot--posts--post--decline"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PATCHapi-v1-shots--shot--posts--post--decline"></code></pre>
</span>
<span id="execution-error-PATCHapi-v1-shots--shot--posts--post--decline" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHapi-v1-shots--shot--posts--post--decline"></code></pre>
</span>
<form id="form-PATCHapi-v1-shots--shot--posts--post--decline" data-method="PATCH"
      data-path="api/v1/shots/{shot}/posts/{post}/decline"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PATCHapi-v1-shots--shot--posts--post--decline', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PATCHapi-v1-shots--shot--posts--post--decline"
                    onclick="tryItOut('PATCHapi-v1-shots--shot--posts--post--decline');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PATCHapi-v1-shots--shot--posts--post--decline"
                    onclick="cancelTryOut('PATCHapi-v1-shots--shot--posts--post--decline');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PATCHapi-v1-shots--shot--posts--post--decline" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/v1/shots/{shot}/posts/{post}/decline</code></b>
        </p>
                <p>
            <label id="auth-PATCHapi-v1-shots--shot--posts--post--decline" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="PATCHapi-v1-shots--shot--posts--post--decline"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>shot</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="shot"
               data-endpoint="PATCHapi-v1-shots--shot--posts--post--decline"
               value="11"
               data-component="url" hidden>
    <br>
<p>the shot been accepted ID</p>
            </p>
                    <p>
                <b><code>post</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="post"
               data-endpoint="PATCHapi-v1-shots--shot--posts--post--decline"
               value="6"
               data-component="url" hidden>
    <br>
<p>the post ID</p>
            </p>
                    </form>

        <h1 id="user">User</h1>

    

            <h2 id="user-PATCHapi-v1-users--id-">Update User Profile</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint updates user first name, last name, phone number and username</p>

<span id="example-requests-PATCHapi-v1-users--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PATCH \
    "http://barter.test/api/v1/users/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"first_name\": \"est\",
    \"last_name\": \"magni\",
    \"phone\": \"in\",
    \"username\": \"temporibus\",
    \"latitude\": \"iste\",
    \"longitude\": \"molestias\",
    \"country\": \"nuxsjdubfbdp\",
    \"state\": \"eafccbzqplqkpkpddh\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://barter.test/api/v1/users/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "first_name": "est",
    "last_name": "magni",
    "phone": "in",
    "username": "temporibus",
    "latitude": "iste",
    "longitude": "molestias",
    "country": "nuxsjdubfbdp",
    "state": "eafccbzqplqkpkpddh"
};

fetch(url, {
    method: "PATCH",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PATCHapi-v1-users--id-">
</span>
<span id="execution-results-PATCHapi-v1-users--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PATCHapi-v1-users--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PATCHapi-v1-users--id-"></code></pre>
</span>
<span id="execution-error-PATCHapi-v1-users--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHapi-v1-users--id-"></code></pre>
</span>
<form id="form-PATCHapi-v1-users--id-" data-method="PATCH"
      data-path="api/v1/users/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PATCHapi-v1-users--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PATCHapi-v1-users--id-"
                    onclick="tryItOut('PATCHapi-v1-users--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PATCHapi-v1-users--id-"
                    onclick="cancelTryOut('PATCHapi-v1-users--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PATCHapi-v1-users--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/v1/users/{id}</code></b>
        </p>
                <p>
            <label id="auth-PATCHapi-v1-users--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="PATCHapi-v1-users--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="PATCHapi-v1-users--id-"
               value="1"
               data-component="url" hidden>
    <br>
<p>The ID of the user.</p>
            </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>first_name</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="first_name"
               data-endpoint="PATCHapi-v1-users--id-"
               value="est"
               data-component="body" hidden>
    <br>
<p>The user last name.</p>
        </p>
                <p>
            <b><code>last_name</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="last_name"
               data-endpoint="PATCHapi-v1-users--id-"
               value="magni"
               data-component="body" hidden>
    <br>
<p>The user first name.</p>
        </p>
                <p>
            <b><code>phone</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="phone"
               data-endpoint="PATCHapi-v1-users--id-"
               value="in"
               data-component="body" hidden>
    <br>
<p>The user phone number,this is a unique field.</p>
        </p>
                <p>
            <b><code>username</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="username"
               data-endpoint="PATCHapi-v1-users--id-"
               value="temporibus"
               data-component="body" hidden>
    <br>
<p>The user username ,and it must be unique.</p>
        </p>
                <p>
            <b><code>latitude</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="latitude"
               data-endpoint="PATCHapi-v1-users--id-"
               value="iste"
               data-component="body" hidden>
    <br>
<p>The user latitude coordinate.</p>
        </p>
                <p>
            <b><code>longitude</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="longitude"
               data-endpoint="PATCHapi-v1-users--id-"
               value="molestias"
               data-component="body" hidden>
    <br>
<p>The user latitude coordinate.</p>
        </p>
                <p>
            <b><code>country</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="country"
               data-endpoint="PATCHapi-v1-users--id-"
               value="nuxsjdubfbdp"
               data-component="body" hidden>
    <br>
<p>Must not be greater than 30 characters.</p>
        </p>
                <p>
            <b><code>state</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="state"
               data-endpoint="PATCHapi-v1-users--id-"
               value="eafccbzqplqkpkpddh"
               data-component="body" hidden>
    <br>
<p>Must not be greater than 30 characters.</p>
        </p>
        </form>

            <h2 id="user-POSTapi-v1-users--user--profile-image">Update Avatar</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint is  for updates users' Avatar</p>

<span id="example-requests-POSTapi-v1-users--user--profile-image">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://barter.test/api/v1/users/1/profile/image" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"avatar\": \"qui\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://barter.test/api/v1/users/1/profile/image"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "avatar": "qui"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-users--user--profile-image">
</span>
<span id="execution-results-POSTapi-v1-users--user--profile-image" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-users--user--profile-image"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-users--user--profile-image"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-users--user--profile-image" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-users--user--profile-image"></code></pre>
</span>
<form id="form-POSTapi-v1-users--user--profile-image" data-method="POST"
      data-path="api/v1/users/{user}/profile/image"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-users--user--profile-image', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-users--user--profile-image"
                    onclick="tryItOut('POSTapi-v1-users--user--profile-image');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-users--user--profile-image"
                    onclick="cancelTryOut('POSTapi-v1-users--user--profile-image');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-users--user--profile-image" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/users/{user}/profile/image</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-v1-users--user--profile-image" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-v1-users--user--profile-image"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>user</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="user"
               data-endpoint="POSTapi-v1-users--user--profile-image"
               value="1"
               data-component="url" hidden>
    <br>

            </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>avatar</code></b>&nbsp;&nbsp;<small>required</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="avatar"
               data-endpoint="POSTapi-v1-users--user--profile-image"
               value="qui"
               data-component="body" hidden>
    <br>
<p>The user profile picture and accepted types are jpeg and jpg and max size of 2M.</p>
        </p>
        </form>

            <h2 id="user-GETapi-v1-users--id-">User Profile</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint is used to view a particular user profile</p>

<span id="example-requests-GETapi-v1-users--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://barter.test/api/v1/users/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://barter.test/api/v1/users/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-users--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;data&quot;: {
        &quot;id&quot;: &quot;7&quot;,
        &quot;type&quot;: &quot;users&quot;,
        &quot;attributes&quot;: {
            &quot;first_name&quot;: &quot;Kaya&quot;,
            &quot;last_name&quot;: &quot;Lubowitz&quot;,
            &quot;username&quot;: &quot;hosea.terry&quot;,
            &quot;phone&quot;: &quot;+1 (470) 496-0838&quot;,
            &quot;email&quot;: &quot;waelchi.christ@example.com&quot;,
            &quot;referrer_token&quot;: &quot;WT3C2K&quot;,
            &quot;user_type&quot;: null,
            &quot;country&quot;: &quot;&quot;,
            &quot;state&quot;: &quot;Illinois&quot;,
            &quot;city&quot;: &quot;Chicago&quot;,
            &quot;avatar&quot;: &quot;&quot;,
            &quot;no_of_posts&quot;: null,
            &quot;no_of_bookmarks&quot;: null,
            &quot;earnings&quot;: &quot;0&quot;
        },
        &quot;relationships&quot;: {
            &quot;posts&quot;: {
                &quot;links&quot;: {
                    &quot;related&quot;: &quot;http://barter.test/api/v1/users/7/posts&quot;
                }
            },
            &quot;comments&quot;: {
                &quot;links&quot;: {
                    &quot;related&quot;: &quot;http://barter.test/api/v1/users/7/comments&quot;
                }
            },
            &quot;shots&quot;: {
                &quot;links&quot;: {
                    &quot;related&quot;: &quot;http://barter.test/api/v1/users/7/shots&quot;
                }
            },
            &quot;transactions&quot;: {
                &quot;links&quot;: {
                    &quot;related&quot;: &quot;http://barter.test/api/v1/transactions/complete/7&quot;
                }
            }
        },
        &quot;meta&quot;: {
            &quot;posts_count&quot;: null,
            &quot;transactions_count&quot;: 0
        },
        &quot;included&quot;: []
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-users--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-users--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-users--id-"></code></pre>
</span>
<span id="execution-error-GETapi-v1-users--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-users--id-"></code></pre>
</span>
<form id="form-GETapi-v1-users--id-" data-method="GET"
      data-path="api/v1/users/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-users--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-users--id-"
                    onclick="tryItOut('GETapi-v1-users--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-users--id-"
                    onclick="cancelTryOut('GETapi-v1-users--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-users--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/users/{id}</code></b>
        </p>
                <p>
            <label id="auth-GETapi-v1-users--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-v1-users--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="GETapi-v1-users--id-"
               value="1"
               data-component="url" hidden>
    <br>
<p>The ID of the user.</p>
            </p>
                    </form>

            <h2 id="user-GETapi-v1-users--user--posts">All User Posts</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-users--user--posts">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://barter.test/api/v1/users/1/posts" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://barter.test/api/v1/users/1/posts"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-users--user--posts">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;data&quot;: {
        &quot;posts&quot;: [
            {
                &quot;id&quot;: &quot;&quot;,
                &quot;type&quot;: &quot;posts&quot;,
                &quot;attributes&quot;: {
                    &quot;author&quot;: &quot;James Bond&quot;,
                    &quot;title&quot;: &quot;Aut deleniti labore cum est natus.&quot;,
                    &quot;description&quot;: &quot;Rerum quia quia exercitationem deleniti explicabo assumenda.&quot;,
                    &quot;condition&quot;: &quot;Commodi voluptate dolores nisi possimus.&quot;,
                    &quot;wishlist&quot;: null,
                    &quot;portfolio&quot;: null,
                    &quot;shoot_able&quot;: true,
                    &quot;status&quot;: &quot;&quot;,
                    &quot;category&quot;: &quot;SWAP ITEM&quot;,
                    &quot;country&quot;: &quot;Costa Rica&quot;,
                    &quot;state&quot;: &quot;Fridaton&quot;,
                    &quot;city&quot;: &quot;East Dovie&quot;,
                    &quot;location&quot;: &quot;af_NA&quot;,
                    &quot;published_at&quot;: &quot;2022-03-05T21:53:43.493454Z&quot;,
                    &quot;created_at&quot;: null,
                    &quot;updated_at&quot;: null,
                    &quot;images&quot;: []
                },
                &quot;relationships&quot;: {
                    &quot;comments&quot;: {
                        &quot;links&quot;: {
                            &quot;related&quot;: &quot;http://barter.test/api/v1/posts/0/comments&quot;
                        }
                    },
                    &quot;author&quot;: {
                        &quot;links&quot;: {
                            &quot;related&quot;: &quot;http://barter.test/api/v1/users/0&quot;
                        }
                    }
                },
                &quot;included&quot;: {
                    &quot;author&quot;: null
                },
                &quot;meta&quot;: {
                    &quot;comments_count&quot;: null
                }
            },
            {
                &quot;id&quot;: &quot;&quot;,
                &quot;type&quot;: &quot;posts&quot;,
                &quot;attributes&quot;: {
                    &quot;author&quot;: &quot;James Bond&quot;,
                    &quot;title&quot;: &quot;Quia harum ut in officiis quis provident.&quot;,
                    &quot;description&quot;: &quot;Numquam est eos eum quisquam occaecati esse sint.&quot;,
                    &quot;condition&quot;: &quot;Dolor eligendi voluptas sequi.&quot;,
                    &quot;wishlist&quot;: null,
                    &quot;portfolio&quot;: null,
                    &quot;shoot_able&quot;: false,
                    &quot;status&quot;: &quot;&quot;,
                    &quot;category&quot;: &quot;SWAP ITEM&quot;,
                    &quot;country&quot;: &quot;Pitcairn Islands&quot;,
                    &quot;state&quot;: &quot;Laruechester&quot;,
                    &quot;city&quot;: &quot;North Meggieside&quot;,
                    &quot;location&quot;: &quot;en_ZW&quot;,
                    &quot;published_at&quot;: &quot;2022-03-05T21:53:43.495930Z&quot;,
                    &quot;created_at&quot;: null,
                    &quot;updated_at&quot;: null,
                    &quot;images&quot;: []
                },
                &quot;relationships&quot;: {
                    &quot;comments&quot;: {
                        &quot;links&quot;: {
                            &quot;related&quot;: &quot;http://barter.test/api/v1/posts/0/comments&quot;
                        }
                    },
                    &quot;author&quot;: {
                        &quot;links&quot;: {
                            &quot;related&quot;: &quot;http://barter.test/api/v1/users/0&quot;
                        }
                    }
                },
                &quot;included&quot;: {
                    &quot;author&quot;: null
                },
                &quot;meta&quot;: {
                    &quot;comments_count&quot;: null
                }
            }
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-users--user--posts" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-users--user--posts"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-users--user--posts"></code></pre>
</span>
<span id="execution-error-GETapi-v1-users--user--posts" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-users--user--posts"></code></pre>
</span>
<form id="form-GETapi-v1-users--user--posts" data-method="GET"
      data-path="api/v1/users/{user}/posts"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-users--user--posts', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-users--user--posts"
                    onclick="tryItOut('GETapi-v1-users--user--posts');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-users--user--posts"
                    onclick="cancelTryOut('GETapi-v1-users--user--posts');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-users--user--posts" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/users/{user}/posts</code></b>
        </p>
                <p>
            <label id="auth-GETapi-v1-users--user--posts" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-v1-users--user--posts"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>user</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="user"
               data-endpoint="GETapi-v1-users--user--posts"
               value="1"
               data-component="url" hidden>
    <br>

            </p>
                    </form>

    

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                            </div>
            </div>
</div>
</body>
</html>

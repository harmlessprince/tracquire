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
    <script src="{{ asset("vendor/scribe/js/tryitout-3.21.0.js") }}"></script>

    <script src="{{ asset("vendor/scribe/js/theme-default-3.21.0.js") }}"></script>

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
                <li class="tocify-item level-1" data-unique="avatar">
                    <a href="#avatar">Avatar</a>
                </li>
                                    <ul id="tocify-subheader-avatar" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="avatar-POSTapi-v1-users--user--profile-image">
                        <a href="#avatar-POSTapi-v1-users--user--profile-image">Update Avatar</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-4" class="tocify-header">
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
                    <ul id="tocify-header-5" class="tocify-header">
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
                    <ul id="tocify-header-6" class="tocify-header">
                <li class="tocify-item level-1" data-unique="messaging">
                    <a href="#messaging">Messaging</a>
                </li>
                                    <ul id="tocify-subheader-messaging" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="messaging-POSTapi-v1-chats-send-message">
                        <a href="#messaging-POSTapi-v1-chats-send-message">Create Message</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="messaging-GETapi-v1-chats-load-messages--receiver-">
                        <a href="#messaging-GETapi-v1-chats-load-messages--receiver-">Show Latest Messages.</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-7" class="tocify-header">
                <li class="tocify-item level-1" data-unique="otp">
                    <a href="#otp">OTP</a>
                </li>
                                    <ul id="tocify-subheader-otp" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="otp-POSTapi-auth-generate-otp">
                        <a href="#otp-POSTapi-auth-generate-otp">Generate OTP</a>
                    </li>
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
                <li class="tocify-item level-1" data-unique="search-post">
                    <a href="#search-post">Search Post</a>
                </li>
                                    <ul id="tocify-subheader-search-post" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="search-post-GETapi-v1-search">
                        <a href="#search-post-GETapi-v1-search">Search Through All Posts</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-11" class="tocify-header">
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
                    <ul id="tocify-header-12" class="tocify-header">
                <li class="tocify-item level-1" data-unique="shot-acceptance">
                    <a href="#shot-acceptance">Shot Acceptance</a>
                </li>
                                    <ul id="tocify-subheader-shot-acceptance" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="shot-acceptance-PATCHapi-v1-shots--shot--accept">
                        <a href="#shot-acceptance-PATCHapi-v1-shots--shot--accept">Accept Shot</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="shot-acceptance-PATCHapi-v1-shots--shot--decline">
                        <a href="#shot-acceptance-PATCHapi-v1-shots--shot--decline">Decline Shot</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-13" class="tocify-header">
                <li class="tocify-item level-1" data-unique="transaction">
                    <a href="#transaction">Transaction</a>
                </li>
                                    <ul id="tocify-subheader-transaction" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="transaction-GETapi-v1-users--user--transactions">
                        <a href="#transaction-GETapi-v1-users--user--transactions">All User Transactions</a>
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
        <li>Last updated: January 12 2022</li>
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
    \"email\": \"ullam\",
    \"password\": \"quae\"
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
    "email": "ullam",
    "password": "quae"
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
               value="ullam"
               data-component="body" hidden>
    <br>
<p>The user email address.</p>
        </p>
                <p>
            <b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="password"
               data-endpoint="POSTapi-auth-login"
               value="quae"
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
    \"token\": \"eos\",
    \"email\": \"maxime\",
    \"password\": \"harum\"
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
    "token": "eos",
    "email": "maxime",
    "password": "harum"
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
            <b><code>token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="token"
               data-endpoint="POSTapi-auth-register"
               value="eos"
               data-component="body" hidden>
    <br>
<p>The token sent to the user.</p>
        </p>
                <p>
            <b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="email"
               data-endpoint="POSTapi-auth-register"
               value="maxime"
               data-component="body" hidden>
    <br>
<p>The the user email,this is a unique field.</p>
        </p>
                <p>
            <b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="password"
               data-endpoint="POSTapi-auth-register"
               value="harum"
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
access-control-allow-origin: *
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
access-control-allow-origin: *
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

        <h1 id="avatar">Avatar</h1>

    

            <h2 id="avatar-POSTapi-v1-users--user--profile-image">Update Avatar</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint is  for updates users' Avatar</p>

<span id="example-requests-POSTapi-v1-users--user--profile-image">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://barter.test/api/v1/users/19/profile/image" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"avatar\": \"ad\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://barter.test/api/v1/users/19/profile/image"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "avatar": "ad"
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
               value="19"
               data-component="url" hidden>
    <br>

            </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>avatar</code></b>&nbsp;&nbsp;<small>required</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="avatar"
               data-endpoint="POSTapi-v1-users--user--profile-image"
               value="ad"
               data-component="body" hidden>
    <br>
<p>The user profile picture and accepted types are jpeg and jpg and max size of 2M.</p>
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
    "http://barter.test/api/v1/posts/14/bookmarks" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://barter.test/api/v1/posts/14/bookmarks"
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
               value="14"
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
access-control-allow-origin: *
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
    --get "http://barter.test/api/v1/posts/7/comments" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://barter.test/api/v1/posts/7/comments"
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
            &quot;id&quot;: &quot;106&quot;,
            &quot;type&quot;: &quot;comments&quot;,
            &quot;attributes&quot;: {
                &quot;body&quot;: &quot;Quia odit esse et earum illum ut.&quot;,
                &quot;created_by&quot;: &quot;N/A&quot;,
                &quot;created_at&quot;: &quot;2022-01-12T07:08:02.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2022-01-12T07:08:02.000000Z&quot;
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
            &quot;id&quot;: &quot;107&quot;,
            &quot;type&quot;: &quot;comments&quot;,
            &quot;attributes&quot;: {
                &quot;body&quot;: &quot;Consectetur ex et dolor adipisci aliquid tempore id.&quot;,
                &quot;created_by&quot;: &quot;N/A&quot;,
                &quot;created_at&quot;: &quot;2022-01-12T07:08:02.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2022-01-12T07:08:02.000000Z&quot;
            },
            &quot;relationships&quot;: {
                &quot;post&quot;: {
                    &quot;links&quot;: {
                        &quot;related&quot;: &quot;http://barter.test/api/v1/posts/15&quot;
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
               value="7"
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
    --get "http://barter.test/api/v1/users/6/comments" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://barter.test/api/v1/users/6/comments"
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
            &quot;id&quot;: &quot;109&quot;,
            &quot;type&quot;: &quot;comments&quot;,
            &quot;attributes&quot;: {
                &quot;body&quot;: &quot;Voluptatibus minus in consequatur sit sunt totam dolorum et.&quot;,
                &quot;created_by&quot;: &quot;N/A&quot;,
                &quot;created_at&quot;: &quot;2022-01-12T07:08:03.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2022-01-12T07:08:03.000000Z&quot;
            },
            &quot;relationships&quot;: {
                &quot;post&quot;: {
                    &quot;links&quot;: {
                        &quot;related&quot;: &quot;http://barter.test/api/v1/posts/2&quot;
                    }
                }
            }
        },
        {
            &quot;id&quot;: &quot;110&quot;,
            &quot;type&quot;: &quot;comments&quot;,
            &quot;attributes&quot;: {
                &quot;body&quot;: &quot;Mollitia eum voluptatem ut ut harum quidem impedit.&quot;,
                &quot;created_by&quot;: &quot;Aiyana&quot;,
                &quot;created_at&quot;: &quot;2022-01-12T07:08:03.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2022-01-12T07:08:03.000000Z&quot;
            },
            &quot;relationships&quot;: {
                &quot;post&quot;: {
                    &quot;links&quot;: {
                        &quot;related&quot;: &quot;http://barter.test/api/v1/posts/10&quot;
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
               value="6"
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
    "http://barter.test/api/v1/posts/11/comments" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"body\": \"molestias\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://barter.test/api/v1/posts/11/comments"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "body": "molestias"
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
        &quot;id&quot;: &quot;108&quot;,
        &quot;type&quot;: &quot;comments&quot;,
        &quot;attributes&quot;: {
            &quot;body&quot;: &quot;Quia perferendis reiciendis accusantium.&quot;,
            &quot;created_by&quot;: &quot;N/A&quot;,
            &quot;created_at&quot;: &quot;2022-01-12T07:08:02.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-01-12T07:08:02.000000Z&quot;
        },
        &quot;relationships&quot;: {
            &quot;post&quot;: {
                &quot;links&quot;: {
                    &quot;related&quot;: &quot;http://barter.test/api/v1/posts/6&quot;
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
               value="11"
               data-component="url" hidden>
    <br>

            </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>body</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="body"
               data-endpoint="POSTapi-v1-posts--post--comments"
               value="molestias"
               data-component="body" hidden>
    <br>
<p>The body of the post and it is maximum of 255 character.</p>
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
    \"receiver\": 8,
    \"message\": \"nulla\",
    \"data\": [
        \"architecto\"
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
    "receiver": 8,
    "message": "nulla",
    "data": [
        "architecto"
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
               value="8"
               data-component="body" hidden>
    <br>
<p>The user receiving the message ID.</p>
        </p>
                <p>
            <b><code>message</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="message"
               data-endpoint="POSTapi-v1-chats-send-message"
               value="nulla"
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

            <h2 id="messaging-GETapi-v1-chats-load-messages--receiver-">Show Latest Messages.</h2>

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
access-control-allow-origin: *
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

        <h1 id="otp">OTP</h1>

    <p>API endpoints for generating and verifying OTP</p>

            <h2 id="otp-POSTapi-auth-generate-otp">Generate OTP</h2>

<p>
</p>

<p>This endpoint sends otp token the provided email address</p>

<span id="example-requests-POSTapi-auth-generate-otp">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://barter.test/api/auth/generate/otp" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"provident\",
    \"username\": \"perspiciatis\",
    \"phone\": \"et\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://barter.test/api/auth/generate/otp"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "provident",
    "username": "perspiciatis",
    "phone": "et"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-auth-generate-otp">
</span>
<span id="execution-results-POSTapi-auth-generate-otp" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-auth-generate-otp"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-generate-otp"></code></pre>
</span>
<span id="execution-error-POSTapi-auth-generate-otp" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-generate-otp"></code></pre>
</span>
<form id="form-POSTapi-auth-generate-otp" data-method="POST"
      data-path="api/auth/generate/otp"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-generate-otp', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-auth-generate-otp"
                    onclick="tryItOut('POSTapi-auth-generate-otp');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-auth-generate-otp"
                    onclick="cancelTryOut('POSTapi-auth-generate-otp');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-auth-generate-otp" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/auth/generate/otp</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="email"
               data-endpoint="POSTapi-auth-generate-otp"
               value="provident"
               data-component="body" hidden>
    <br>
<p>The user email address.</p>
        </p>
                <p>
            <b><code>username</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="username"
               data-endpoint="POSTapi-auth-generate-otp"
               value="perspiciatis"
               data-component="body" hidden>
    <br>
<p>The user username.</p>
        </p>
                <p>
            <b><code>phone</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="phone"
               data-endpoint="POSTapi-auth-generate-otp"
               value="et"
               data-component="body" hidden>
    <br>
<p>The the user phone number.</p>
        </p>
        </form>

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
    \"identifier\": \"nam\",
    \"token\": \"sed\"
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
    "identifier": "nam",
    "token": "sed"
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
            <b><code>identifier</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="identifier"
               data-endpoint="POSTapi-auth-email-verify-otp"
               value="nam"
               data-component="body" hidden>
    <br>
<p>The user email address.</p>
        </p>
                <p>
            <b><code>token</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="token"
               data-endpoint="POSTapi-auth-email-verify-otp"
               value="sed"
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
    \"token\": \"earum\",
    \"email\": \"nisi\",
    \"password\": \"quae\"
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
    "token": "earum",
    "email": "nisi",
    "password": "quae"
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
               value="earum"
               data-component="body" hidden>
    <br>
<p>The token sent to the user.</p>
        </p>
                <p>
            <b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="email"
               data-endpoint="POSTapi-auth-reset-password"
               value="nisi"
               data-component="body" hidden>
    <br>
<p>The user email address.</p>
        </p>
                <p>
            <b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="password"
               data-endpoint="POSTapi-auth-reset-password"
               value="quae"
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
                    &quot;title&quot;: &quot;Et quisquam itaque error sit explicabo illo.&quot;,
                    &quot;description&quot;: &quot;Nemo sit modi officia blanditiis.&quot;,
                    &quot;condition&quot;: &quot;Cum molestiae rerum sed nihil cumque non.&quot;,
                    &quot;shoot_able&quot;: false,
                    &quot;status&quot;: null,
                    &quot;category&quot;: &quot;SWAP ITEM&quot;,
                    &quot;country&quot;: &quot;Gabon&quot;,
                    &quot;state&quot;: &quot;Port Jeanie&quot;,
                    &quot;city&quot;: &quot;West Willisport&quot;,
                    &quot;location&quot;: &quot;ha_NG&quot;,
                    &quot;published_at&quot;: &quot;2022-01-12T07:08:02.617288Z&quot;,
                    &quot;created_at&quot;: null,
                    &quot;updated_at&quot;: null,
                    &quot;images&quot;: []
                },
                &quot;relationships&quot;: {
                    &quot;comments&quot;: {
                        &quot;links&quot;: {
                            &quot;related&quot;: &quot;http://barter.test/api/v1/posts/0/comments&quot;
                        }
                    }
                }
            },
            {
                &quot;id&quot;: &quot;&quot;,
                &quot;type&quot;: &quot;posts&quot;,
                &quot;attributes&quot;: {
                    &quot;author&quot;: &quot;James Bond&quot;,
                    &quot;title&quot;: &quot;Sed consequatur quo vero rerum dolorem et.&quot;,
                    &quot;description&quot;: &quot;Esse molestiae maiores eos molestiae incidunt voluptates.&quot;,
                    &quot;condition&quot;: &quot;Dolores iste quia ut nisi omnis.&quot;,
                    &quot;shoot_able&quot;: true,
                    &quot;status&quot;: null,
                    &quot;category&quot;: &quot;SWAP SERVICE&quot;,
                    &quot;country&quot;: &quot;Ecuador&quot;,
                    &quot;state&quot;: &quot;Aufderharview&quot;,
                    &quot;city&quot;: &quot;Raynorville&quot;,
                    &quot;location&quot;: &quot;el_GR&quot;,
                    &quot;published_at&quot;: &quot;2022-01-12T07:08:02.620941Z&quot;,
                    &quot;created_at&quot;: null,
                    &quot;updated_at&quot;: null,
                    &quot;images&quot;: []
                },
                &quot;relationships&quot;: {
                    &quot;comments&quot;: {
                        &quot;links&quot;: {
                            &quot;related&quot;: &quot;http://barter.test/api/v1/posts/0/comments&quot;
                        }
                    }
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
    \"category\": 8,
    \"description\": \"eum\",
    \"condition\": \"sint\",
    \"images\": [
        \"enim\"
    ],
    \"wishlist\": \"exercitationem\",
    \"portfolio\": \"nobis\",
    \"shoot_able\": false
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
    "category": 8,
    "description": "eum",
    "condition": "sint",
    "images": [
        "enim"
    ],
    "wishlist": "exercitationem",
    "portfolio": "nobis",
    "shoot_able": false
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
            &quot;title&quot;: &quot;Provident velit incidunt explicabo.&quot;,
            &quot;description&quot;: &quot;Voluptas aspernatur labore maxime sit.&quot;,
            &quot;condition&quot;: &quot;In qui commodi labore ut sapiente vitae eaque.&quot;,
            &quot;shoot_able&quot;: false,
            &quot;status&quot;: null,
            &quot;category&quot;: &quot;GIVE&quot;,
            &quot;country&quot;: &quot;Saint Helena&quot;,
            &quot;state&quot;: &quot;Tillmanland&quot;,
            &quot;city&quot;: &quot;Sibylmouth&quot;,
            &quot;location&quot;: &quot;kam_KE&quot;,
            &quot;published_at&quot;: &quot;2022-01-12T07:08:02.638188Z&quot;,
            &quot;created_at&quot;: null,
            &quot;updated_at&quot;: null,
            &quot;images&quot;: []
        },
        &quot;relationships&quot;: {
            &quot;comments&quot;: {
                &quot;links&quot;: {
                    &quot;related&quot;: &quot;http://barter.test/api/v1/posts/0/comments&quot;
                }
            }
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
            <b><code>category</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="category"
               data-endpoint="POSTapi-v1-posts"
               value="8"
               data-component="body" hidden>
    <br>
<p>The post category ID.</p>
        </p>
                <p>
            <b><code>description</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="description"
               data-endpoint="POSTapi-v1-posts"
               value="eum"
               data-component="body" hidden>
    <br>
<p>The post description.</p>
        </p>
                <p>
            <b><code>condition</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="condition"
               data-endpoint="POSTapi-v1-posts"
               value="sint"
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
            <b><code>wishlist</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="wishlist"
               data-endpoint="POSTapi-v1-posts"
               value="exercitationem"
               data-component="body" hidden>
    <br>
<p>The post wishlist.</p>
        </p>
                <p>
            <b><code>portfolio</code></b>&nbsp;&nbsp;<small>url</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="portfolio"
               data-endpoint="POSTapi-v1-posts"
               value="nobis"
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
        </form>

            <h2 id="post-GETapi-v1-posts--id-">Show Post</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-posts--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://barter.test/api/v1/posts/3" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://barter.test/api/v1/posts/3"
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
            &quot;title&quot;: &quot;Id iste non facilis rerum unde quae.&quot;,
            &quot;description&quot;: &quot;Eos blanditiis ut nihil unde velit doloremque fugit.&quot;,
            &quot;condition&quot;: &quot;Ad natus sapiente facere.&quot;,
            &quot;shoot_able&quot;: false,
            &quot;status&quot;: null,
            &quot;category&quot;: &quot;SWAP SERVICE&quot;,
            &quot;country&quot;: &quot;Liechtenstein&quot;,
            &quot;state&quot;: &quot;New Josefashire&quot;,
            &quot;city&quot;: &quot;Boehmland&quot;,
            &quot;location&quot;: &quot;fr_SN&quot;,
            &quot;published_at&quot;: &quot;2022-01-12T07:08:02.643111Z&quot;,
            &quot;created_at&quot;: null,
            &quot;updated_at&quot;: null,
            &quot;images&quot;: []
        },
        &quot;relationships&quot;: {
            &quot;comments&quot;: {
                &quot;links&quot;: {
                    &quot;related&quot;: &quot;http://barter.test/api/v1/posts/0/comments&quot;
                }
            }
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
               value="3"
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
    "http://barter.test/api/v1/posts/15" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://barter.test/api/v1/posts/15"
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
               value="15"
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
    "http://barter.test/api/v1/posts/3" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://barter.test/api/v1/posts/3"
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
            &quot;title&quot;: &quot;Eos adipisci omnis maxime dolores.&quot;,
            &quot;description&quot;: &quot;Labore omnis est et aperiam.&quot;,
            &quot;condition&quot;: &quot;Quis dolore ut temporibus.&quot;,
            &quot;shoot_able&quot;: false,
            &quot;status&quot;: null,
            &quot;category&quot;: &quot;SWAP ITEM&quot;,
            &quot;country&quot;: &quot;Pitcairn Islands&quot;,
            &quot;state&quot;: &quot;Jaymefort&quot;,
            &quot;city&quot;: &quot;Farrellfort&quot;,
            &quot;location&quot;: &quot;ga_IE&quot;,
            &quot;published_at&quot;: &quot;2022-01-12T07:08:02.647330Z&quot;,
            &quot;created_at&quot;: null,
            &quot;updated_at&quot;: null,
            &quot;images&quot;: []
        },
        &quot;relationships&quot;: {
            &quot;comments&quot;: {
                &quot;links&quot;: {
                    &quot;related&quot;: &quot;http://barter.test/api/v1/posts/0/comments&quot;
                }
            }
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
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
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
               value="3"
               data-component="url" hidden>
    <br>
<p>The ID of the post.</p>
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
    --get "http://barter.test/api/v1/search?page[number]=11&amp;page[size]=16" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://barter.test/api/v1/search"
);

const params = {
    "page[number]": "11",
    "page[size]": "16",
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
                    &quot;title&quot;: &quot;Blanditiis adipisci quod consequuntur qui.&quot;,
                    &quot;description&quot;: &quot;Quaerat quaerat odio porro a pariatur dolores est.&quot;,
                    &quot;condition&quot;: &quot;Sit qui qui eos libero.&quot;,
                    &quot;shoot_able&quot;: false,
                    &quot;status&quot;: null,
                    &quot;category&quot;: &quot;GIVE&quot;,
                    &quot;country&quot;: &quot;Christmas Island&quot;,
                    &quot;state&quot;: &quot;Joannefort&quot;,
                    &quot;city&quot;: &quot;Natalieland&quot;,
                    &quot;location&quot;: &quot;sv_SE&quot;,
                    &quot;published_at&quot;: &quot;2022-01-12T07:08:03.119065Z&quot;,
                    &quot;created_at&quot;: null,
                    &quot;updated_at&quot;: null,
                    &quot;images&quot;: []
                },
                &quot;relationships&quot;: {
                    &quot;comments&quot;: {
                        &quot;links&quot;: {
                            &quot;related&quot;: &quot;http://barter.test/api/v1/posts/0/comments&quot;
                        }
                    }
                }
            },
            {
                &quot;id&quot;: &quot;&quot;,
                &quot;type&quot;: &quot;posts&quot;,
                &quot;attributes&quot;: {
                    &quot;author&quot;: &quot;James Bond&quot;,
                    &quot;title&quot;: &quot;Aliquam vitae et in dolorum.&quot;,
                    &quot;description&quot;: &quot;Quasi ut autem inventore magnam facere iusto voluptas.&quot;,
                    &quot;condition&quot;: &quot;Expedita eveniet aut esse velit neque sint unde voluptas.&quot;,
                    &quot;shoot_able&quot;: false,
                    &quot;status&quot;: null,
                    &quot;category&quot;: &quot;SWAP ITEM&quot;,
                    &quot;country&quot;: &quot;United Arab Emirates&quot;,
                    &quot;state&quot;: &quot;East Evalyn&quot;,
                    &quot;city&quot;: &quot;Port Lisandroburgh&quot;,
                    &quot;location&quot;: &quot;it_IT&quot;,
                    &quot;published_at&quot;: &quot;2022-01-12T07:08:03.121121Z&quot;,
                    &quot;created_at&quot;: null,
                    &quot;updated_at&quot;: null,
                    &quot;images&quot;: []
                },
                &quot;relationships&quot;: {
                    &quot;comments&quot;: {
                        &quot;links&quot;: {
                            &quot;related&quot;: &quot;http://barter.test/api/v1/posts/0/comments&quot;
                        }
                    }
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
               value="11"
               data-component="query" hidden>
    <br>
<p>The page number.</p>
            </p>
                    <p>
                <b><code>page[size]</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="page[size]"
               data-endpoint="GETapi-v1-search"
               value="16"
               data-component="query" hidden>
    <br>
<p>The page number.</p>
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
    --get "http://barter.test/api/v1/posts/13/shots" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://barter.test/api/v1/posts/13/shots"
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
                    &quot;created_at&quot;: &quot;2022-01-12 07:01:08&quot;,
                    &quot;updated_at&quot;: &quot;2022-01-12 07:01:08&quot;,
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
                    &quot;created_at&quot;: &quot;2022-01-12 07:01:08&quot;,
                    &quot;updated_at&quot;: &quot;2022-01-12 07:01:08&quot;,
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
               value="13"
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
    --get "http://barter.test/api/v1/users/19/shots" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://barter.test/api/v1/users/19/shots"
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
                    &quot;created_at&quot;: &quot;2022-01-12 07:01:08&quot;,
                    &quot;updated_at&quot;: &quot;2022-01-12 07:01:08&quot;,
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
                    &quot;created_at&quot;: &quot;2022-01-12 07:01:08&quot;,
                    &quot;updated_at&quot;: &quot;2022-01-12 07:01:08&quot;,
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
               value="19"
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
    --get "http://barter.test/api/v1/posts/18/shots/19" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://barter.test/api/v1/posts/18/shots/19"
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
            &quot;created_at&quot;: &quot;2022-01-12 07:01:08&quot;,
            &quot;updated_at&quot;: &quot;2022-01-12 07:01:08&quot;,
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
               value="18"
               data-component="url" hidden>
    <br>
<p>The ID of the post.</p>
            </p>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="GETapi-v1-posts--post_id--shots--id-"
               value="19"
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
    "http://barter.test/api/v1/posts/4/shots" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"description\": \"quidem\",
    \"condition\": \"illum\",
    \"images\": [
        \"nihil\"
    ]
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://barter.test/api/v1/posts/4/shots"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "description": "quidem",
    "condition": "illum",
    "images": [
        "nihil"
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
            &quot;created_at&quot;: &quot;2022-01-12 07:01:08&quot;,
            &quot;updated_at&quot;: &quot;2022-01-12 07:01:08&quot;,
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
               value="4"
               data-component="url" hidden>
    <br>

            </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>description</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="description"
               data-endpoint="POSTapi-v1-posts--post--shots"
               value="quidem"
               data-component="body" hidden>
    <br>
<p>The shot description.</p>
        </p>
                <p>
            <b><code>condition</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="condition"
               data-endpoint="POSTapi-v1-posts--post--shots"
               value="illum"
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

    

            <h2 id="shot-acceptance-PATCHapi-v1-shots--shot--accept">Accept Shot</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint is used for accepting shot by a post creator.
It close the post from accepting shot</p>

<span id="example-requests-PATCHapi-v1-shots--shot--accept">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PATCH \
    "http://barter.test/api/v1/shots/14/accept" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://barter.test/api/v1/shots/14/accept"
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

<span id="example-responses-PATCHapi-v1-shots--shot--accept">
</span>
<span id="execution-results-PATCHapi-v1-shots--shot--accept" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PATCHapi-v1-shots--shot--accept"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PATCHapi-v1-shots--shot--accept"></code></pre>
</span>
<span id="execution-error-PATCHapi-v1-shots--shot--accept" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHapi-v1-shots--shot--accept"></code></pre>
</span>
<form id="form-PATCHapi-v1-shots--shot--accept" data-method="PATCH"
      data-path="api/v1/shots/{shot}/accept"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PATCHapi-v1-shots--shot--accept', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PATCHapi-v1-shots--shot--accept"
                    onclick="tryItOut('PATCHapi-v1-shots--shot--accept');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PATCHapi-v1-shots--shot--accept"
                    onclick="cancelTryOut('PATCHapi-v1-shots--shot--accept');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PATCHapi-v1-shots--shot--accept" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/v1/shots/{shot}/accept</code></b>
        </p>
                <p>
            <label id="auth-PATCHapi-v1-shots--shot--accept" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="PATCHapi-v1-shots--shot--accept"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>shot</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="shot"
               data-endpoint="PATCHapi-v1-shots--shot--accept"
               value="14"
               data-component="url" hidden>
    <br>
<p>the shot been accepted ID</p>
            </p>
                    <p>
                <b><code>post</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="post"
               data-endpoint="PATCHapi-v1-shots--shot--accept"
               value="1"
               data-component="url" hidden>
    <br>
<p>the post ID</p>
            </p>
                    </form>

            <h2 id="shot-acceptance-PATCHapi-v1-shots--shot--decline">Decline Shot</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint is used for accepting shot by a post creator.
It close the post from accepting shot</p>

<span id="example-requests-PATCHapi-v1-shots--shot--decline">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PATCH \
    "http://barter.test/api/v1/shots/4/decline" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://barter.test/api/v1/shots/4/decline"
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

<span id="example-responses-PATCHapi-v1-shots--shot--decline">
</span>
<span id="execution-results-PATCHapi-v1-shots--shot--decline" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PATCHapi-v1-shots--shot--decline"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PATCHapi-v1-shots--shot--decline"></code></pre>
</span>
<span id="execution-error-PATCHapi-v1-shots--shot--decline" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHapi-v1-shots--shot--decline"></code></pre>
</span>
<form id="form-PATCHapi-v1-shots--shot--decline" data-method="PATCH"
      data-path="api/v1/shots/{shot}/decline"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PATCHapi-v1-shots--shot--decline', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PATCHapi-v1-shots--shot--decline"
                    onclick="tryItOut('PATCHapi-v1-shots--shot--decline');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PATCHapi-v1-shots--shot--decline"
                    onclick="cancelTryOut('PATCHapi-v1-shots--shot--decline');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PATCHapi-v1-shots--shot--decline" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/v1/shots/{shot}/decline</code></b>
        </p>
                <p>
            <label id="auth-PATCHapi-v1-shots--shot--decline" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="PATCHapi-v1-shots--shot--decline"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>shot</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="shot"
               data-endpoint="PATCHapi-v1-shots--shot--decline"
               value="4"
               data-component="url" hidden>
    <br>
<p>the shot been accepted ID</p>
            </p>
                    <p>
                <b><code>post</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="post"
               data-endpoint="PATCHapi-v1-shots--shot--decline"
               value="18"
               data-component="url" hidden>
    <br>
<p>the post ID</p>
            </p>
                    </form>

        <h1 id="transaction">Transaction</h1>

    

            <h2 id="transaction-GETapi-v1-users--user--transactions">All User Transactions</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-users--user--transactions">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://barter.test/api/v1/users/3/transactions" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://barter.test/api/v1/users/3/transactions"
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

<span id="example-responses-GETapi-v1-users--user--transactions">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;data&quot;: [
        [],
        []
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-users--user--transactions" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-users--user--transactions"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-users--user--transactions"></code></pre>
</span>
<span id="execution-error-GETapi-v1-users--user--transactions" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-users--user--transactions"></code></pre>
</span>
<form id="form-GETapi-v1-users--user--transactions" data-method="GET"
      data-path="api/v1/users/{user}/transactions"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-users--user--transactions', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-users--user--transactions"
                    onclick="tryItOut('GETapi-v1-users--user--transactions');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-users--user--transactions"
                    onclick="cancelTryOut('GETapi-v1-users--user--transactions');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-users--user--transactions" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/users/{user}/transactions</code></b>
        </p>
                <p>
            <label id="auth-GETapi-v1-users--user--transactions" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-v1-users--user--transactions"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>user</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="user"
               data-endpoint="GETapi-v1-users--user--transactions"
               value="3"
               data-component="url" hidden>
    <br>

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
    \"first_name\": \"illo\",
    \"last_name\": \"exercitationem\",
    \"phone\": \"nemo\",
    \"username\": \"beatae\"
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
    "first_name": "illo",
    "last_name": "exercitationem",
    "phone": "nemo",
    "username": "beatae"
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
            <b><code>first_name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="first_name"
               data-endpoint="PATCHapi-v1-users--id-"
               value="illo"
               data-component="body" hidden>
    <br>
<p>The user last name.</p>
        </p>
                <p>
            <b><code>last_name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="last_name"
               data-endpoint="PATCHapi-v1-users--id-"
               value="exercitationem"
               data-component="body" hidden>
    <br>
<p>The user first name.</p>
        </p>
                <p>
            <b><code>phone</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="phone"
               data-endpoint="PATCHapi-v1-users--id-"
               value="nemo"
               data-component="body" hidden>
    <br>
<p>The the user phone number,this is a unique field.</p>
        </p>
                <p>
            <b><code>username</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="username"
               data-endpoint="PATCHapi-v1-users--id-"
               value="beatae"
               data-component="body" hidden>
    <br>
<p>The the user username and it must be unique.</p>
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
    --get "http://barter.test/api/v1/users/15" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://barter.test/api/v1/users/15"
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
        &quot;id&quot;: &quot;25&quot;,
        &quot;type&quot;: &quot;users&quot;,
        &quot;attributes&quot;: {
            &quot;first_name&quot;: &quot;Kavon&quot;,
            &quot;last_name&quot;: &quot;Dickens&quot;,
            &quot;username&quot;: &quot;mbechtelar&quot;,
            &quot;phone&quot;: &quot;330-671-5552&quot;,
            &quot;email&quot;: &quot;jevon20@example.org&quot;,
            &quot;user_type&quot;: null,
            &quot;country&quot;: &quot;Saudi Arabia&quot;,
            &quot;state&quot;: &quot;Riyadh Region&quot;,
            &quot;city&quot;: &quot;Riyadh&quot;,
            &quot;avatar&quot;: &quot;&quot;,
            &quot;no_of_posts&quot;: null,
            &quot;no_of_bookmarks&quot;: null,
            &quot;earnings&quot;: &quot;0&quot;
        },
        &quot;relationships&quot;: {
            &quot;posts&quot;: {
                &quot;links&quot;: {
                    &quot;related&quot;: &quot;http://barter.test/api/v1/users/25/posts&quot;
                }
            },
            &quot;comments&quot;: {
                &quot;links&quot;: {
                    &quot;related&quot;: &quot;http://barter.test/api/v1/users/25/comments&quot;
                }
            },
            &quot;shots&quot;: {
                &quot;links&quot;: {
                    &quot;related&quot;: &quot;http://barter.test/api/v1/users/25/shots&quot;
                }
            },
            &quot;transactions&quot;: {
                &quot;links&quot;: {
                    &quot;related&quot;: &quot;http://barter.test/api/v1/users/25/transactions&quot;
                }
            }
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
               value="15"
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
    --get "http://barter.test/api/v1/users/10/posts" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://barter.test/api/v1/users/10/posts"
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
                    &quot;title&quot;: &quot;Officiis molestiae quia dolorem voluptates quia.&quot;,
                    &quot;description&quot;: &quot;Hic nesciunt praesentium enim sequi eius et nobis velit.&quot;,
                    &quot;condition&quot;: &quot;Deleniti ipsa ratione et vitae dolor at harum.&quot;,
                    &quot;shoot_able&quot;: true,
                    &quot;status&quot;: null,
                    &quot;category&quot;: &quot;SWAP SERVICE&quot;,
                    &quot;country&quot;: &quot;Montserrat&quot;,
                    &quot;state&quot;: &quot;Danielatown&quot;,
                    &quot;city&quot;: &quot;Port Bonnieburgh&quot;,
                    &quot;location&quot;: &quot;bn_BD&quot;,
                    &quot;published_at&quot;: &quot;2022-01-12T07:08:03.071461Z&quot;,
                    &quot;created_at&quot;: null,
                    &quot;updated_at&quot;: null,
                    &quot;images&quot;: []
                },
                &quot;relationships&quot;: {
                    &quot;comments&quot;: {
                        &quot;links&quot;: {
                            &quot;related&quot;: &quot;http://barter.test/api/v1/posts/0/comments&quot;
                        }
                    }
                }
            },
            {
                &quot;id&quot;: &quot;&quot;,
                &quot;type&quot;: &quot;posts&quot;,
                &quot;attributes&quot;: {
                    &quot;author&quot;: &quot;James Bond&quot;,
                    &quot;title&quot;: &quot;Sit voluptate et quidem.&quot;,
                    &quot;description&quot;: &quot;Pariatur velit ipsa doloribus praesentium.&quot;,
                    &quot;condition&quot;: &quot;Id quas porro tempore in eos.&quot;,
                    &quot;shoot_able&quot;: false,
                    &quot;status&quot;: null,
                    &quot;category&quot;: &quot;GIVE&quot;,
                    &quot;country&quot;: &quot;Dominica&quot;,
                    &quot;state&quot;: &quot;Cummingsview&quot;,
                    &quot;city&quot;: &quot;South Maurinemouth&quot;,
                    &quot;location&quot;: &quot;sl_SI&quot;,
                    &quot;published_at&quot;: &quot;2022-01-12T07:08:03.073131Z&quot;,
                    &quot;created_at&quot;: null,
                    &quot;updated_at&quot;: null,
                    &quot;images&quot;: []
                },
                &quot;relationships&quot;: {
                    &quot;comments&quot;: {
                        &quot;links&quot;: {
                            &quot;related&quot;: &quot;http://barter.test/api/v1/posts/0/comments&quot;
                        }
                    }
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
               value="10"
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

<h1>Documentation of API's</h1>

<h1>Authentication API's</h1>
<h2>Log in Api</h2>
<p>Route:meal.dev/api/login?email=&password=</p>
<p>Request type:Post with email and password</p>

<h2>Logout in Api</h2>
<p>Route:meal.dev/api/logout/{token}</p>
<p>Request type:GET with the token to destroy</p>

<h1>Memebers  API's</h1>

<h2>show all members Api</h2>
<p>Route:meal.dev/api/members?token=</p>
<p>Request type:GET </p>

<h2>Crete new member Api</h2>
<p>Route:meal.dev/api/members?token=&name=</p>
<p>Request type:POst </p>
<p>if user has deposit than pass it Via deposit=</p>


<h2>show all bazars of a single member Api</h2>
<p>Route:meal.dev/api/members/{id}?token=</p>
<p>Request type:GET ,id is member id</p>

<h2>Update a member  info Api</h2>
<p>Route:meal.dev/api/members/{id}?name=&meal_count=&token=</p>
<p>Request type:PUT ,id is member id</p>

<h2>delete a member info and his/her bazars Api</h2>
<p>Route:meal.dev/api/members/{id}?token=</p>
<p>Request type:Delete ,id is member id</p>

<h1>Bazar API's</h1>

<h2>show all bazars Api</h2>
<p>Route:meal.dev/api/bazars?token=</p>
<p>Request type:GET </p>

<h2>Crete new bazar Api</h2>
<p>Route:meal.dev/api/bazars?member_id=&period_id=&amount=0&date=&token=</p>
<p>Request type:POst </p>
<p>if user has note than pass it Via note=</p>


<h2>show a single bazar details</h2>
<p>Route:meal.dev/api/bazars/{id}?token=</p>
<p>Request type:GET ,id is bazar id</p>

<h2>Update a  bazar info Api</h2>
<p>Route:meal.dev/api/bazars/{id}?member_id=&period_id=&amount=&date=&token=</p>
<p>Request type:PUT ,id is bazar id</p>

<h2>delete a bazar  Api</h2>
<p>Route:meal.dev/api/bazars/{id}?token=</p>
<p>Request type:Delete ,id is bazar id</p>

<h1>Period API's</h1>

<h2>show all periods Api</h2>
<p>Route:meal.dev/api/periods?token=</p>
<p>Request type:GET </p>

<h2>Crete new period Api</h2>
<p>Route:meal.dev/api/periods?name=&token=</p>
<p>Request type:POst </p>



<h2>show all bazar of a  single period </h2>
<p>Route:meal.dev/api/periods/{id}?token=</p>
<p>Request type:GET ,id is period id</p>



<h2>delete a period  Api</h2>
<p>Route:meal.dev/api/periods/{id}?token=</p>
<p>Request type:Delete ,id is period id</p>

<h2>show all bazar of a  member in asingle period </h2>
<p>Route:meal.dev/api/periods/{period_id}/{user_id}?token=</p>
<p>Request type:GET</p>









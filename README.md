
#Documentation of API's

##Authentication API's
##Log in Api
Route:meal.dev/api/login?email=&password=
 request parameters
    {
        "email":"admin@yahoo.com"
        "passsword":"admin"
     }
         
    {
        "LoggerID": 10,
        "DeviceID": "0660AF02",
        "LogDateTime": "2016-08-17 13:48:57.115331",
        "Distance": 20
    }
  #output
         {
              "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6XC9cL21lYWwuZGV2XC9hcGlcL2xvZ2luIiwiaWF0IjoxNTAxMDYxMzQzLCJleHAiOjE1MDEwNjQ5NDMsIm5iZiI6MTUwMTA2MTM0MywianRpIjoiaGxJT0FOMkZlUUlWSWY0bSJ9.QhVnJuF85mTNWeuUnGI7rrBX5jrpArdKD9nIBaG1ZtA"
         }

##Logout in Api
Route:meal.dev/api/logout/{token}
Request type:GET with the token to destroy

#Memebers  API's

##show all members Api
Route:meal.dev/api/members?token=
Request type:GET 

##Crete new member Api
Route:meal.dev/api/members?token=&name=
Request type:POst 
if user has deposit than pass it Via deposit=


##show all bazars of a single member Api
Route:meal.dev/api/members/{id}?token=
Request type:GET ,id is member id

##Update a member  info Api
Route:meal.dev/api/members/{id}?name=&meal_count=&token=
Request type:PUT ,id is member id

##delete a member info and his/her bazars Api
Route:meal.dev/api/members/{id}?token=
Request type:Delete ,id is member id

#Bazar API's

##show all bazars Api
Route:meal.dev/api/bazars?token=
Request type:GET 

##Crete new bazar Api
Route:meal.dev/api/bazars?member_name=&period=&amount=0&date=&token=
Request type:POst 
if user has note than pass it Via note=


##show a single bazar details
Route:meal.dev/api/bazars/{id}?token=
Request type:GET ,id is bazar id

##Update a  bazar info Api
Route:meal.dev/api/bazars/{id}?member_id=&period=&amount=&date=&token=
Request type:PUT ,id is bazar id

##delete a bazar  Api
Route:meal.dev/api/bazars/{id}?token=
Request type:Delete ,id is bazar id

#Period API's

##show all periods Api
Route:meal.dev/api/periods?token=
Request type:GET 

##Crete new period Api
Route:meal.dev/api/periods?name=&token=
Request type:POst 



##show all bazar of a  single period 
Route:meal.dev/api/periods/{id}?token=
Request type:GET ,id is period id



##delete a period  Api
Route:meal.dev/api/periods/{id}?token=
Request type:Delete ,id is period id

##show all bazar of a  member in asingle period 
Route:meal.dev/api/periods/{period_id}/{user_id}?token=
Request type:GET









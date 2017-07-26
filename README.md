
# Documentation of API's not

## Authentication API's

## Log in Api
Route:meal.dev/api/login?email=&password=

 request parameters
    {
	        "email":"admin@yahoo.com"
	        "passsword":"admin"
     }
         

 output
 
         {
              "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6XC9cL21lYWwuZGV2XC9hcGlcL"
         }

## Logout  Api

Route:meal.dev/api/logout/{token}

Request type:GET with the token to destroy

 request parameters
 
    {
	        "token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6XC9cL21lYWwuZGV2XC9hcGlc"
	     
     }

# Memebers  API's

## show all members Api

Route:meal.dev/api/members?token=

Request type:GET 

 request parameters
 
     {
	        "token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6XC9cL21lYWwuZGV2XC9hcGlc"
	     
     }
 

## Crete new member Api

Route:meal.dev/api/members?token=&name=

Request type:POst 

 request parameters
 
      {
	        "token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6XC9cL21lYWwuZGV2XC9hcGlc",
		'name':'jhon doe'
	     
     }


## show all bazars of a single member Api

Route:meal.dev/api/members/{id}?token=

Request type:GET ,id is member id

request parameters

 
        {
	        "token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6XC9cL21lYWwuZGV2XC9hcGlc",
		'id':1
	     
        }
	
## show all bazar of a  member in asingle period 

Route:meal.dev/api/periods/{period_id}/{memeber_id}?token=

Request type:GET 

request parameters

 
        {
	        "token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6XC9cL21lYWwuZGV2XC9hcGlc",
		
	     
        }
  
## Update a member  info Api

Route:meal.dev/api/members/{id}?name=&meal_count=&token=

Request type:PUT ,id is member id

request parameters
 
        {
	        "token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6XC9cL21lYWwuZGV2XC9hcGlc",
		'name':'jhon doe',
		'meal_count:23',
		'deposit':500,//if deposited
	     
         }

## delete a member info and his/her bazars Api

Route:meal.dev/api/members/{id}?token=

Request type:Delete ,id is member id

 request parameters
 
    {
	     "token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6XC9cL21lYWwuZGV2XC9hcGlc"
	     
     }

# Bazar API's

## show all bazars Api

Route:meal.dev/api/bazars?token=

Request type:GET 

 request parameters
 

     {
	     "token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6XC9cL21lYWwuZGV2XC9hcGlc"
	     
     }


## Crete new bazar Api

Route:meal.dev/api/bazars?member_name=&period=&amount=0&date=&token=

Request type:POst 

if user has note than pass it Via note=

 request parameters
 

     {
	     "token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6XC9cL21lYWwuZGV2XC9hcGlc",
	     'memebr_name':'jhon doe',
	     'period':'july',
	     "amount":'500',
	     'date':'23.4.17',
	     
     }


## show a single bazar details

Route:meal.dev/api/bazars/{id}?token=

Request type:GET ,id is bazar id

 request parameters
 

      {
	     "token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6XC9cL21lYWwuZGV2XC9hcGlc",
	           
      }


## Update a  bazar info Api

Route:meal.dev/api/bazars/{id}?member_id=&period=&amount=&date=&token=

Request type:PUT ,id is bazar id

 request parameters
 

     {
	     "token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6XC9cL21lYWwuZGV2XC9hcGlc",
	     'memebr_name':'jhon doe',
	     'period':'july',
	     "amount":'500',
	     'date':'23.4.17',
	     'note':'some text' //if have note
	     
     }
     

## delete a bazar  Api

Route:meal.dev/api/bazars/{id}?token=

Request type:Delete ,id is bazar id

 request parameters


       {
	     "token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6XC9cL21lYWwuZGV2XC9hcGlc",
	    
	     
       }
       

# Period API's

## show all periods Api

Route:meal.dev/api/periods?token=

Request type:GET 

 request parameters
 

     {
	     "token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6XC9cL21lYWwuZGV2XC9hcGlc",
	
	     
     }
     

## Crete new period Api

Route:meal.dev/api/periods?name=&token=

Request type:POst 

 request parameters
 

     {
	     "token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6XC9cL21lYWwuZGV2XC9hcGlc",
	     'name':'august',
	    
	     
     }
     
     

## show all bazar of a  single period 

Route:meal.dev/api/periods/{id}?token=

Request type:GET ,id is period id

 request parameters
 

      {
	     "token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6XC9cL21lYWwuZGV2XC9hcGlc",
	   
	     
      }


## delete a period  Api

Route:meal.dev/api/periods/{id}?token=

Request type:Delete ,id is period id

 request parameters
 

     {
	     "token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6XC9cL21lYWwuZGV2XC9hcGlc",
	    
	     
     }
     












# Documentation of API's not

## Authentication API's

## registration api

Route:meal.dev/api/register?name=&email=&password=&password_confirmation=

request type :POST

  
 request parameters
 
    {
	        "email":"admin@yahoo.com",
		'name':'admdin'
	        "passsword":"admin",
		"password_confirmation":"admin",
		
		
     }
     
     
     
  Output
  
  
     {
	    "token":  "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6XC9cL2",
	    "user": {
		"id": 1,
		"name": "admin",
		"email": "admin@yahoo.com",
		"created_at": "2017-07-19 12:07:48",
		"updated_at": "2017-07-19 12:07:48"
	            }
     }
  
     


## Log in Api
Route:meal.dev/api/login?email=&password=

 request parameters
 
     {
	        "email":"admin@yahoo.com",
	        "passsword":"admin",
      }
     
         

  Output
  
  
      {
	    "token":  "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6XC9cL2",
	    "user": {
		"id": 1,
		"name": "admin",
		"email": "admin@yahoo.com",
		"created_at": "2017-07-19 12:07:48",
		"updated_at": "2017-07-19 12:07:48"
	            }
       }
    

## Logout  Api

Route:meal.dev/api/logout/{token}

Request type:GET with the token to destroy

 request parameters
 
     {
	        "token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6XC9cL21lYWwuZGV2XC9hcGlc"
	     
     }
     
  output

        { 
          "message": "you are logout"
        }


# Memebers  API's

## show all members Api

Route:meal.dev/api/members?token=

Request type:GET 

 request parameters
 
     {
	        "token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6XC9cL21lYWwuZGV2XC9hcGlc"
	     
     }
     
  outout
  
	  {
		    "content": [
			{
			    "id": 1,
			    "name": "sakib2",
			    "meal_count": null,
			    "deposit": null,
			    "user_id": 1,
			    "created_at": "2017-07-19 12:12:08",
			    "updated_at": "2017-07-20 09:55:18"
			}
		    ]
	}
 

## Crete new member Api

Route:meal.dev/api/members?token=&name=

Request type:POst 

 request parameters
 
      {
	        "token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6XC9cL21lYWwuZGV2XC9hcGlc",
		'name':'jhon doe'
	     
     }
     
  output
   
   
	   {
		    "content": {
			"name": "ashik",
			"user_id": 1,
			"updated_at": "2017-07-26 11:19:41",
			"created_at": "2017-07-26 11:19:41",
			"id": 3
		    },
		   "message": "member created succesfully"
	}


## show all bazars of a single member Api

Route:meal.dev/api/members/{id}?token=

Request type:GET ,id is member id

request parameters

 
        {
	        "token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6XC9cL21lYWwuZGV2XC9hcGlc",
		'id':1
	     
        }
	
outout 


	 {
		    "content": {
			"id": 1,
			"name": "sakib2",
			"meal_count": null,
			"deposit": null,
			"user_id": 1,
			"created_at": "2017-07-19 12:12:08",
			"updated_at": "2017-07-20 09:55:18",
			"bazars": [
			    {
				"id": 3,
				"period_id": 2,
				"member_id": 1,
				"amount": 250,
				"date": "12.2.17",
				"note": null,
				"created_at": "2017-07-20 09:04:02",
				"updated_at": "2017-07-20 09:04:02"
			    },
			    {
				"id": 4,
				"period_id": 2,
				"member_id": 1,
				"amount": 600,
				"date": "20/5/2017",
				"note": null,
				"created_at": "2017-07-20 09:58:27",
				"updated_at": "2017-07-20 09:58:27"
			    }
			]
		    }
	}
	
## show all bazar of a  member in asingle period 

Route:meal.dev/api/periods/{period_id}/{memeber_id}?token=

Request type:GET 

request parameters

 
        {
	        "token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6XC9cL21lYWwuZGV2XC9hcGlc",
		
	     
        }
	
output

	{
		    "content": {
			"id": 2,
			"name": "july",
			"status": 0,
			"user_id": 1,
			"created_at": "2017-07-19 19:53:23",
			"updated_at": "2017-07-20 09:45:14"
		    },
		    "bazars": [
			{
			    "id": 3,
			    "period_id": 2,
			    "member_id": 1,
			    "amount": 250,
			    "date": "12.2.17",
			    "note": null,
			    "created_at": "2017-07-20 09:04:02",
			    "updated_at": "2017-07-20 09:04:02"
			},
			{
			    "id": 4,
			    "period_id": 2,
			    "member_id": 1,
			    "amount": 600,
			    "date": "20/5/2017",
			    "note": null,
			    "created_at": "2017-07-20 09:58:27",
			    "updated_at": "2017-07-20 09:58:27"
			}
		    ]
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
	 
output

	{
	    "content": {
		"id": 1,
		"name": "sakib",
		"meal_count": null,
		"deposit": null,
		"user_id": 1,
		"created_at": "2017-07-19 12:12:08",
		"updated_at": "2017-07-26 11:27:34"
	    },
	    "message": "member updated succesfully"
       }

## delete a member info and his/her bazars Api

Route:meal.dev/api/members/{id}?token=

Request type:Delete ,id is member id

 request parameters
 
    {
	     "token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6XC9cL21lYWwuZGV2XC9hcGlc"
	     
     }
     
output

	{
		    "content": {
			"id": 3,
			"name": "ashik",
			"meal_count": null,
			"deposit": null,
			"user_id": 1,
			"created_at": "2017-07-26 11:19:41",
			"updated_at": "2017-07-26 11:19:41",
			"bazars": []
		    },
		    "message": "member and his/her bazars deleted succesfully"

	}

# Bazar API's

## show all bazars  Api

Route:meal.dev/api/bazars?token=

Request type:GET 

 request parameters
 

     {
	     "token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6XC9cL21lYWwuZGV2XC9hcGlc"
	     
     }
     
   output
   
	   {
		    "content": [
			{
			    "id": 3,
			    "period_id": 2,
			    "member_id": 1,
			    "amount": 250,
			    "date": "12.2.17",
			    "note": null,
			    "created_at": "2017-07-20 09:04:02",
			    "updated_at": "2017-07-20 09:04:02",
			    "user_id": 1
			},
			{
			    "id": 4,
			    "period_id": 2,
			    "member_id": 1,
			    "amount": 600,
			    "date": "20/5/2017",
			    "note": null,
			    "created_at": "2017-07-20 09:58:27",
			    "updated_at": "2017-07-20 09:58:27",
			    "user_id": 1
			}
		    ]
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
     
 output
 
	 {
		    "content": {
			"amount": "60",
			"date": "20/5/2017",
			"period_id": 2,
			"member_id": 1,
			"updated_at": "2017-07-26 11:35:05",
			"created_at": "2017-07-26 11:35:05",
			"id": 5
		    },
		    "message": "Bazar created succesfully"
	}


## show a single bazar details

Route:meal.dev/api/bazars/{id}?token=

Request type:GET ,id is bazar id

 request parameters
 

      {
	     "token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6XC9cL21lYWwuZGV2XC9hcGlc",
	           
      }
      
 output
 
	{
		    "content": {
			"id": 3,
			"period_id": 2,
			"member_id": 1,
			"amount": 250,
			"date": "12.2.17",
			"note": null,
			"created_at": "2017-07-20 09:04:02",
			"updated_at": "2017-07-20 09:04:02",
			"user_id": 1,
			"member": {
			    "id": 1,
			    "name": "sakib",
			    "meal_count": null,
			    "deposit": null,
			    "user_id": 1,
			    "created_at": "2017-07-19 12:12:08",
			    "updated_at": "2017-07-26 11:27:34"
			}
		    }
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
     











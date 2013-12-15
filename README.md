p4.katecooperuk.com
===================

Project 4

"ChatterBox Book Club"


My application is an extension of my P2 application, ChatterBox. It is a forum for Book Club members where users can sign up, upload book suggestions and start a discussion about the books they have read. Once users have signed up they can follow other Book Club members, see books already uploaded to the bookshelf, add posts and view other members posts they are following.

Features:
-	Members can upload an avatar image to replace the default image

-	Uploaded books link to Google Books via the ISBN number which generates a pop-up window with info on the book

-	New members receive an automated 'Welcome Email'

- 	Server-side error checking: 
		- email & passwords will login correctly
		- if the user's email already exists on the database
		- if a book of the same title has already been uploaded to the database
		
- 	Javascript client-side error checking includes: 
		- blank fields on all forms
		- correct email entry
		- numbers only in add book ISBN field
		
-	Javascript management of the Google Books preview button/pop-up window
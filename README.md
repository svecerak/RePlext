# RePlext

  RePlext is a Request & Discover web application platform that gives Plex users the ability to easily search, manage and request content. I manage my own Plex media server as a hobby, and share access to its content with a select few friends. I soon found it troublesome keeping track of requests, and decided to build this application as both a way to learn about full-stack development and to solve a problem I face in the real world. By allowing users to register for an account and request content, it allows me to keep all requests centralized and easily accessible.
  
https://sasa-replext.herokuapp.com/

# Demo - Click to play

[![https://imgur.com/a/WiaftUl](http://img.youtube.com/vi/30xBDmbHI30/0.jpg)](http://www.youtube.com/watch?v=30xBDmbHI30 "RePlext Demo")

# What I've Learned

  Rather than diving directly into using frameworks to expedite the development process, I chose to first try building everything from scratch as a valuable learning experience. Frameworks such as Laravel offer an out-of-the-box HTTP client, authentication, ORM, etc. built around MVC architecture to make development easier and scalable. I felt that in order to fully appreciate and understand why web frameworks are so essential in modern web development, I had to encounter and experience some of the difficulties and challenges that are encountered in their absence. 
  
  In its current iteration, there's a lot of improvement required in the application's organization. I quickly found as the project grew, it became difficult to manage. The business logic isn't separated enough from the view at present, and would benefit from seperation into views, routes and controllers. The HTTP request organization and speed would greatly benefit from using cURL or an HTTP request client such as Guzzle. I've been reading about API wrappers, and see this as something I should potentially focus on down the line.
  
  As for the front-end, I used Tailwind CSS for styling. Having acquired an understanding of HTML and CSS when creating my portfolio website, I found Tailwind CSS very intuitive and helpful in creating flexible and responsive layouts.
  
Lots more to work on, still a work in progress.

![](assets/images/maincard_screenshot.jpg)

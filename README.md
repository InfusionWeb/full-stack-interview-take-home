# Contact Submission API Challenge

Thank you for taking the time to complete this challenge! The goal is to assess your understanding of PHP, Laravel, RESTful API design, middleware, validation, database relationships. It's also ment to assess your ability to write accessible and mobile friendly HTML / CSS.

We want to see how you think and how you approach full stack tasks. We've set up a good starting point so you shouldn't have to do much if any boiler plate work.

## Resources
- [Laravel Docs](https://laravel.com/docs)
- We included a postman collection in the root of this project called `api.postman_collection.json`. You can import this into Postman to test the API endpoints.
- [Tailwind CSS](https://tailwindcss.com/docs)

---

## The Task
The marketing team needs a landing page built out that can accept form submissions. These submissions will be managed by an internal admin system built by a different team. The issue is that this admin system is a simple UI with no real backend. It gets all it's data fed to it via API requests from other systems. So your task is to build out the landing page a CRUD API to manage these submissions.

## Requirements to run this project
- Docker
- Node v20+
- Postman (optional, but recommended)

## Installation
1) Either download the [zip file](https://github.com/InfusionWeb/full-stack-interview-take-home/archive/refs/heads/master.zip) or use [this repo](https://github.com/InfusionWeb/full-stack-interview-take-home/tree/master) as a template to create your own repo
  - If you use the zip file, please ensure you unzip it before continuing
  - If you use the repo as a template, please ensure you clone it to your local machine
1) Open terminal or command line
1) `cd` into the project folder
1) In the root of your project run:
	1) `docker compose up --build`
  - Note: This will install composer, your .env file as well as run the database migrations and seeders. If you would like refresh your database you can run `docker compose exec app php artisan migrate:fresh --seed` to reset the database and seed it again.
1) Open a new terminal to the root of the project and run:
	1) `npm install`

#### Using Vue
In order to enable Vue on the sample project do this:
1) in the `vite.config.js` file, uncomment line 23

#### Using React
In order to enable React on the sample project do this:
1) In the `vite.config.js` file, uncomment line 26
1) In the `welcome.blade.php` file, uncomment lines 14 & 17
1) In the same welcome file, comment out line 20

#### Using Vanilla JS
Not much you need to do extra to use vanilla js. Should work out of the box.

## Running the project
1) Ensure you have completed the installation steps above
1) Navigate to the root of the project in your terminal
1) Open terminal and run `docker compose up`
  - This will start the Laravel backend on port 8080
1) Open another terminal and run `npm run build && npm run dev`
1) In your browser navigate to `http://localhost:8080`
	- You should see `Hello!`

## Requirements

### Backend (Laravel)
- Create some kind of API validation to validate a bearer token passed via the `Authorization` header
  - The endpoints that need the validation logic have a `// TODO: Add Bearer token auth` comment on them
      - This doesnt need to be overly complex
  - There's a model called `ApiKey`. With this model you can fetch the token with `\App\Models\ApiKey::first()`
  - For your reference, the `api_keys` table gets populated with a seeder. You can find the seeder in `database/seeders/ApiKeySeeder.php`.
    - The key is `4fbac20c153d325a40fb8384f2d2a02268e1ee70cc782e2962cb23a8d4b4c710` and should be passed to the `Authorization` header as `Bearer 4fbac20c153d325a40fb8384f2d2a02268e1ee70cc782e2962cb23a8d4b4c710`
- Create an endpoint to list all submissions
  - Update the method `index` in the `SubmissionController.php` file
  - Set up the route
  - This endpoint should include the same bearer token validation as the other endpoints
- Bonus: Can you update the `last_used_at` column on the `api_keys` table when a request is made to the API with a given key?

### Frontend
You can use any Javascript framework you would like. To make things easy we've added the starting points for Vue, React and Vanilla JS. We've also included Tailwind CSS 4.0+ for styling. You can use any CSS framework you would like, but Tailwind is already set up and ready to go. You may also modify the vite.config.js to use a CSS preprocessor if you'd like.
- Build out the Landing page based on the given Figma design.
	- You should have gotten the figma link with the link to this project. If not please reach out to the recruiter.
- Add some basic form validation
	- Ensure that an email is an email
	- No empty fields
	- etc
- Fetch a list of "Departments" from `/api/departments` and populate the department dropdown
- Ensure the user experience is pleasant when submitting a form or getting error messages
- Ensure the page is mobile friendly
  - Use your best judgement on mobile flow / layout.
- Ensure the page is accessible
  - We use the `WAVE Evaluation Tool` chrome extension to check for accessibility issues. You can install it from the Chrome Web Store. It will help you identify any accessibility issues on your page.

## Deliverables
- A public or private git repo with a final working project. (Github, Gitlab, Bitbucket all work)
	- Something we can clone, set up and test
	- If it's a private repo please work with the recruiter to invite one of our devs
- A working, mobile friendly and accessible landing page that accepts new submissions.
- A efficient API that allows external systems to access resources secured by a bearer token.

## Time Expectations
This challenge is designed to be completed in 3-5 hours of focused work. Please don't overthink or overbuild, we're evaluating practical implementation, not a production-ready app. We're also not expecting any tests.

## Thank You
We appreciate your time and effort. If anything is unclear, feel free to document assumptions, that’s just as valuable as asking.

Good luck!

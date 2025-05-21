
# Contact Submission API Challenge

Thank you for taking the time to complete this challenge! The goal is to assess your understanding of PHP, Laravel, RESTful API design, middleware, validation, database relationships. It's also ment to assess your ability to write accessible and mobile friendly HTML / CSS.

We want to see how you think and how you approach full stack tasks. We've set up a good starting point so you shouldn't have to do much if any boiler plate work.

---

## The Task
The marketing team needs a landing page built out that can accept form submissions. These submissions will be managed by an internal admin system built by a different team. The issue is that this admin system is a simple UI with no real backend. It gets all it's data fed to it via API requests from other systems. So your task is to build out the landing page a CRUD API to manage these submissions.

## Requirements to run this project
- PHP 8.2+
- Composer
- Node v20+

## Installation
1) Create a new project using this repo as a "template"
1) Clone your new project
1) In the root of your project run:
	1) `composer install`
	1) `npm install`
	1) `php artisan migrate --seed`

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
1) Open terminal and run `php artisan serve`
1) Open another terminal and run `npm run build && npm run dev`
1) In your browser navigate to https://127.0.0.1:8000
	- You should see `Hello!`

## Requirements

### Backend (Laravel)
- Add the new "Submissions" API routes
  - Create a submission
  - List all submissions
  - Get a single submission
  - Update a submission
  - Delete a submission
 - Update the `SubmissionsController.php` to handle the new endpoints
 - Documentation of the API contract
 - Come up with suggestions on how we can improve API security
 - Bonus: Update the `ValidateApiKey.php` file to update the `last_used_at` column in the api_keys table for a given key.

### Frontend
The landing page should be mobile friendly and pass basic accessibility checks using the `WAVE Evaluation Tool` chrome extension. You can use any Javascript framework you would like. To make things easy we've added the starting points for Vue, React and Vanilla JS.
- Build out the Landing page based on the given Figma design.
	- You should have gotten the figma link with the link to this project
- Add some basic form validation
	- Ensure that an email is an email
	- No empty fields
	- etc
- Fetch a list of "Departments" from `/api/departments` and populate the department dropdown
- Ensure the user experience is pleasent when submitting a form or getting error messages
- Ensure the page is mobile friendly
- Ensure the page is accessible

## Deliverables
- A public or private git repo with a final working project. (Github, Gitlab, Bitbucket all work)
	- Something we can clone, set up and test
	- If it's a private repo please work with the recruiter to invite one of our devs
- A working, mobile friendly, accessible landing page that accepts new submissions.
- A efficient API that allows external systems to access resources with a given API key.

## Time Expectations
This challenge is designed to be completed in **4-6 hours** of focused work. Please don't overthink or overbuild — we're evaluating practical implementation, not a production-ready app. We're also not expecting any tests. If you want to write tests thats great, we have Pest installed just in case.

## Thank You
We appreciate your time and effort. If anything is unclear, feel free to document assumptions — that’s just as valuable as asking.

Good luck!

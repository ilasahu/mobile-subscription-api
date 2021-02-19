
## About

It is a laravel application which provides mobile app subscription management APIs, worker and callback. 


## Api

### Authentication
This application provides authentication using [sanctum](https://laravel.com/docs/8.x/sanctum)

### /api/register
You can register your device with appId, uId, os, language. It is a post request.
This api returns with a token if the registration is successful.
If the device already exists with same appId and uId, it returns `register OK`

### /api/verify-purchase
This is an authenticated endpoint and the request needs to have a bearer token which you get while registration and a receipt. This endpoint will verify if the receipt hash sent is valid or not. It wil return an object with status true or false. It is a post request.

### /api/check-subscription
This endpoint returns the subscription status of the device. It is a get request and needs to have a bearer token.

## Worker
We are using laravel scheduler to run a command every hour which verifies all the active devices' hash receipt. 
We can change the Frequency Option of the task scheduler depending on the requirement.
We are using chunk to get the data from devices in chunks
We are keeping the track of the device if is is processed or not by `is_queued` column in the devices table
We mark the is_queued as 0 the request is processed.
The command pushes an event with the queueable listerner and it calls the ios/google api which we have mocked with a facade here.

## Callback
This application have three callback events (started, renewed and cancelled) which notifies the application endpoint for any changes in the device subscription.

## Reporting
This application has a purchases table which can be used to retrieve the report. Right now, there is no implementation only for future reference.


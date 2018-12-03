<?php
use Swagger\Annotations as SWG;
/**
 * @SWG\Swagger(
 * 		basePath="/v1",
 * 		host="api.local",
 * 		schemes={"http"},
 * 		produces={"application/json"},
 * 		consumes={"application/json"},
 * 		@SWG\Info(
 * 			title="API",
 * 			description="REST API",
 * 			version="1.0",
 * 			termsOfService="terms",
 * 			@SWG\Contact(name="call@me.com"),
 * 			@SWG\License(name="proprietary")
 * 		),
 *
 * 		@SWG\Definition(
 * 			name="User",
 * 			required={"email", "first_name", "last_name"},
 * 			@SWG\Property(name="id", type="string", description="UUID"),
 * 			@SWG\Property(name="email", type="string"),
 * 			@SWG\Property(name="password", type="string"),
 * 			@SWG\Property(name="first_name", type="string"),
 * 			@SWG\Property(name="last_name", type="string"),
 * 			@SWG\Property(name="active", type="boolean"),
 * 		),
 * 		@SWG\Definition(
 * 	     	name="UserLock",
 * 			required={"user_id", "type", "reason"},
 * 			@SWG\Property(name="id", type="integer"),
 * 			@SWG\Property(name="user_id", type="string", description="UUID"),
 * 			@SWG\Property(name="reason", type="string"),
 * 		),
 * 		@SWG\Definition(
 * 			name="Error",
 * 			required={"status", "code", "message"},
 *			@SWG\Property(name="status", type="string"),
 *			@SWG\Property(name="code", type="integer"),
 *			@SWG\Property(name="message", type="string"),
 * 		),
 * )
 */
Route::group(['prefix' => 'v1'], function() {
    /**
     *
     * - users ------------------------------------------------------
     *
     * @SWG\Get(
     * 		path="/users/{id}",
     * 		tags={"users"},
     * 		operationId="getUser",
     * 		summary="Fetch user details",
     * 		@SWG\Parameter(
     * 			name="id",
     * 			in="path",
     * 			required=true,
     * 			type="string",
     * 			description="UUID",
     * 		),
     * 		@SWG\Response(
     * 			status=200,
     * 			description="success",
     * 			@SWG\Schema(ref="#/definitions/User"),
     * 		),
     * 		@SWG\Response(
     * 			status="default",
     * 			description="error",
     * 			@SWG\Schema(ref="#/definitions/Error"),
     * 		),
     * 	)
     *
     */
    Route::get('/users/{user_id}', 'UserController@show');
    /**
     *
     * @SWG\Post(
     * 		path="/users",
     * 		tags={"users"},
     * 		operationId="createUser",
     * 		summary="Create new user entry",
     * 		@SWG\Parameter(
     * 			name="user",
     * 			in="body",
     * 			required=true,
     * 			@SWG\Schema(ref="#/definitions/User"),
     *		),
     * 		@SWG\Response(
     * 			status=200,
     * 			description="success",
     * 			@SWG\Schema(ref="#/definitions/User"),
     * 		),
     * 		@SWG\Response(
     * 			status="default",
     * 			description="error",
     * 			@SWG\Schema(ref="#/definitions/Error"),
     * 		),
     * 	)
     *
     */
    Route::post('/users/', 'UserController@store');
    /**
     *
     * 	@SWG\Put(
     * 		path="/users/{id}",
     * 		tags={"users"},
     * 		operationId="updateUser",
     * 		summary="Update user entry",
     * 		@SWG\Parameter(
     * 			name="id",
     * 			in="path",
     * 			required=true,
     * 			type="string",
     * 			description="UUID",
     * 		),
     * 		@SWG\Parameter(
     * 			name="user",
     * 			in="body",
     * 			required=true,
     * 			@SWG\Schema(ref="#/definitions/User"),
     *		),
     * 		@SWG\Response(
     * 			status=200,
     * 			description="success",
     * 		),
     * 		@SWG\Response(
     * 			status="default",
     * 			description="error",
     * 			@SWG\Schema(ref="#/definitions/Error"),
     * 		),
     * 	)
     *
     */
    Route::put('/users/{user_id}', 'UserController@update');
    /**
     *
     * 	@SWG\Delete(
     * 		path="/users/{id}",
     * 		tags={"users"},
     * 		operationId="deleteUser",
     * 		summary="Remove user entry",
     * 		@SWG\Parameter(
     * 			name="id",
     * 			in="path",
     * 			required=true,
     * 			type="string",
     * 			description="UUID",
     * 		),
     * 		@SWG\Response(
     * 			status=200,
     * 			description="success",
     * 		),
     * 		@SWG\Response(
     * 			status="default",
     * 			description="error",
     * 			@SWG\Schema(ref="#/definitions/Error"),
     * 		),
     * 	)
     *
     */
    Route::delete('/users/{user_id}', 'UserController@destroy');
    /**
     * 	@SWG\Get(
     * 		path="/users/{user_id}/locks/{id}",
     * 		tags={"users"},
     * 		operationId="getUserLock",
     * 		summary="Fetch specified lock for user",
     * 		@SWG\Parameter(
     * 			name="user_id",
     * 			in="path",
     * 			required=true,
     * 			type="string",
     * 			description="UUID",
     * 		),
     * 		@SWG\Parameter(
     * 			name="id",
     * 			in="path",
     * 			required=true,
     * 			type="integer",
     * 			description="biginteger",
     * 		),
     * 		@SWG\Response(
     * 			status=200,
     * 			description="success",
     * 			@SWG\Schema(ref="#/definitions/UserLock"),
     * 		),
     * 		@SWG\Response(
     * 			status="default",
     * 			description="error",
     * 			@SWG\Schema(ref="#/definitions/Error"),
     * 		),
     * 	)
     *
     * 	@SWG\Get(
     * 		path="/users/{user_id}/locks",
     * 		tags={"users"},
     * 		operationId="listUserLocks",
     * 		summary="List user locks",
     * 		@SWG\Parameter(
     * 			name="user_id",
     * 			in="path",
     * 			required=true,
     * 			type="string",
     * 			description="UUID",
     * 		),
     * 		@SWG\Response(
     * 			status=200,
     * 			description="success",
     * 			@SWG\Schema(ref="#/definitions/UserLock"),
     * 		),
     * 		@SWG\Response(
     * 			status="default",
     * 			description="error",
     * 			@SWG\Schema(ref="#/definitions/Error"),
     * 		),
     * 	),
     */

    /**
     * @SWG\Post(path="/signup/user_login",
     *   tags={"user_login"},
     *   summary="This method used for both user login via Native and Social Login",
     *   description="",
     *   operationId="user_login",
     *   produces={"application/json", "application/xml"},
     *   @SWG\Parameter(
     *     name="email",
     *     in="formData",
     *     description="The user email for login",
     *     required=true,
     *     type="string"
     *   ),
     *   @SWG\Parameter(
     *     name="password",
     *     in="formData",
     *     description="The password for login in clear text",
     *     required=true,
     *     type="string"
     *   ),
     *   @SWG\Parameter(
     *     name="remember_me",
     *     in="formData",
     *     description="The remember_me parameter for save user details",
     *     required=false,
     *     type="boolean"
     *   ),
     *   @SWG\Parameter(
     *     name="user_time_zone",
     *     in="formData",
     *     description="The user timezone id",
     *     required=false,
     *     type="integer"
     *   ),
     *   @SWG\Response(
     *     response=200,
     *     description="successful operation",
     *     @SWG\Schema(ref="#/definitions/User"),
     *   ),
     *   @SWG\Response(response=400, description="Invalid username/password supplied")
     * )
     */

    /**
     * @SWG\Post(
     *      security={
     *          {"api_key":{}}
     *      },
     *      summary="Validates delivery address",
     *      tags={"checkout"},
     *      consumes={"application/json"},
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="JSON Payload",
     *          required=true,
     *          type="json",
     *          format="application/json",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(property="title", type="string", example="Mr"),
     *              @SWG\Property(property="first_name", type="string", example="Bob"),
     *              @SWG\Property(property="last_name", type="string", example="Jones"),
     *              @SWG\Property(property="address1", type="string", example="1 Mayfair"),
     *              @SWG\Property(property="address2", type="string", example="Mr"),
     *              @SWG\Property(property="town", type="string", example="London"),
     *              @SWG\Property(property="postcode", type="string", example="232323"),
     *              @SWG\Property(property="country", type="string", example="FR"),
     *              @SWG\Property(property="phone", type="string", example="34343243243"),
     *          )
     *
     *      ),
     * )
     */
    Route::resource('/users/{user_id}/locks', 'UserLockController', ['only' => ['index', 'show']]);
});
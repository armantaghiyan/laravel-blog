<?php

//----------------------------------------------------------------------------------------------------------------------
//---------------------------------------------------- RES -------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------------

const RES_SUCCESS = 'success';
const RES_ERROR_MESSAGE = 'error_message';
const RES_ERROR_VALIDATION = 'error_validation';
const RES_ERROR_NO_TOKEN = 'no_token';

//----------------------------------------------------------------------------------------------------------------------
//-------------------------------------------------- RES KEY -----------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------------

const RK_USER = 'user';
const RK_MESSAGE = 'message';
const RK_RESULT = 'result';
const RK_API_TOKEN = 'api_token';
const RK_POSTS = 'posts';
const RK_POST = 'post';

//----------------------------------------------------------------------------------------------------------------------
//-------------------------------------------------- PARAMS ------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------------

const P_LOADED_COUNT = 'loaded_count';
const P_TOPIC = 'topic';
const P_TAG = 'tag';
const P_QUERY = 'query';
const P_NAME = 'name';
const P_EMAIL = 'email';
const P_PASSWORD = 'password';
const P_API_TOKEN = 'api_token';
const P_USER = 'user';
const P_USERNAME = 'username';

//----------------------------------------------------------------------------------------------------------------------
//-------------------------------------------------- STORAGE -----------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------------

const PATH_POST_THUMBNAIL = 'posts/thumbnail/';
const PATH_USER_AVATAR = 'users/avatar/';

//----------------------------------------------------------------------------------------------------------------------
//-------------------------------------------------- GUARD -----------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------------

const GUARD_WEB = 'web';
const GUARD_API = 'api';

//----------------------------------------------------------------------------------------------------------------------
//---------------------------------------------------- COLS ------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------------

const COL_CREATED_AT = 'created_at';
const COL_UPDATED_AT = 'updated_at';


const TB_USERS = 'users';
const COL_USER_ID = 'id';
const COL_USER_NAME = 'name';
const COL_USER_EMAIL = 'email';
const COL_USER_USERNAME = 'username';
const COL_USER_AVATAR = 'avatar';
const COL_USER_EMAIL_VERIFIED_AT = 'email_verified_at';
const COL_USER_PASSWORD = 'password';
const COL_USER_REMEMBER_TOKEN = 'remember_token';


const TB_TAGS = 'tags';
const COL_TAG_ID = 'id';
const COL_TAG_TITLE = 'title';
const COL_TAG_SLUG = 'slug';


const TB_POSTS = 'posts';
const COL_POST_ID = 'id';
const COL_POST_USER_ID = 'user_id';
const COL_POST_TOPIC_ID = 'topic_id';
const COL_POST_TITLE = 'title';
const COL_POST_SLUG = 'slug';
const COL_POST_THUMBNAIL = 'thumbnail';
const COL_POST_CONTENT = 'content';
const COL_POST_STATUS = 'status';


const TB_TOPICS = 'topics';
const COL_TOPIC_ID = 'id';
const COL_TOPIC_TITLE = 'title';
const COL_TOPIC_SLUG = 'slug';


const TB_LIKES = 'likes';
const COL_LIKE_ID = 'id';
const COL_LIKE_USER_ID = 'user_id';
const COL_LIKE_TARGET_ID = 'target_id';
const COL_LIKE_TARGET_TYPE = 'target_type';

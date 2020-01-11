# Training API - Slim APP REST API with database schema sql

## Install and Run
### Requirements
1. Run the sql file(Training.sql) in mysql DB
2. Go to public folder of this application and run php -S localhost:8888 to start server

### Database with all relations refined
Refer to /data/sql/COURSE-ER-DIAGRAM.pdf

### Interact with the API

__Get list of sessions__

```curl "http://localhost:8888/api/sessions?userId=2"```

```curl "http://localhost:8080/api/sessions?userId=2&category=1"```

__Get list of courses__

```curl "http://localhost:8080//api/courses"```

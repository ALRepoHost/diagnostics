# from httpobs.conf import BROKER_URL

# Set the Celery task queue
CELERY_ACCEPT_CONTENT = ['json']
CELERY_IGNORE_RESULTS = False
CELERY_REDIRECT_STDOUTS_LEVEL = 'CRITICAL'
CELERY_RESULT_SERIALIZER = 'json'
CELERY_TASK_SERIALIZER = 'json'

# Daemon
CELERYD_TASK_SOFT_TIME_LIMIT = 300
CELERYD_TASK_TIME_LIMIT = 600

# Beat
CELERYBEAT_SCHEDULE = {
    'abort-broken-scans': {
        'task': 'httpobs.database.tasks.abort_broken_scans',
        'schedule': 1800,
    }
}

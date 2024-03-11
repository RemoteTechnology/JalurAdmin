pipeline {
    agent any
    environment {
        DOCKER_COMPOSE_VERSION = '3.8'
    }
    stages {
        stage('Checkout') {
            steps {
                git 'https://github.com/Remote-Siberian-Hammer/JalurAdmin'
            }
        }
        stage('Run Docker Compose') {
            steps {
                sh 'docker-compose up --build -d'
            }
        }
        stage('Test') {
            steps {
                sh 'docker-compose -f docker-compose.production.yml run artisan test'
            }
        }
        stage('Deploy') {
            steps {
                sshagent(['YIV7qll1B4ptUsrA']) {
                    sh '''
                        ssh root@89.104.69.88 'cd /var/www/JalurAdmin && git pull origin main'
                        ssh root@89.104.69.88 'cd /var/www/JalurAdmin && docker-compose restart'
                    '''
                }
            }
        }
    }
}
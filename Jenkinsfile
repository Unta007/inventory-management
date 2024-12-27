pipeline {
    agent any

    stages {
        stage('Checkout Github') {
            steps {
                git branch: 'main', credentialsId: 'github-credentials', url: 'https://github.com/Unta007/inventory-management.git'
            }
        }
        stage('Pull Image Docker') {
            steps {
                script {
                    docker.image("unta/inventory-management:latest").pull()
                }
            }
        }
        stage('Running Test') {
            steps {
                script {
                    bat 'docker-compose run --rm app php artisan test'
                }
            }
        }
        stage('Deploy') {
            steps {
                script {
                    bat 'docker-compose down'
                    bat 'docker-compose up --build -d'
                }
            }
        }
    }
}

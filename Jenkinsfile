pipeline {
    agent any

    stages {
        stage('Checkout') {
            steps {
                // Checkout the code from your GitHub repository
                git branch: 'main', credentialsId: 'github-credentials', url: 'https://github.com/Unta007/inventory-management.git'
            }
        }
        stage('Pull Existing Docker Image') {
            steps {
                script {
                    // Pull the existing Docker image if needed
                    // This step can be omitted if you are sure the image is already available
                    docker.image("unta/inventory-management:latest").pull()
                }
            }
        }
        stage('Run Tests') {
            steps {
                script {
                    // Run tests using Docker Compose
                    bat 'docker-compose run --rm app php artisan test'
                }
            }
        }
        stage('Deploy') {
            steps {
                script {
                    bat 'docker-compose down' // Stop and remove existing containers
                    bat 'docker-compose up --build -d' // Build and start containers in detached mode
                }
            }
        }
    }
}

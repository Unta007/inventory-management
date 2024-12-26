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
                    docker.image("unta/fauzan-inventoryeskrimo:latest").pull()
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
                    // Deploy the application using Docker Compose
                    sh 'docker-compose up -d'
                }
            }
        }
    }

    post {
        success {
            // Notify on success (e.g., send an email or Slack message)
            echo 'Deployment successful!'
        }
        failure {
            // Notify on failure
            echo 'Deployment failed!'
        }
    }
}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Ecommerce</title>
    <link rel="shortcut icon" href="images/arbre.jpeg" type="image/x-icon">
</head>
<body class="flex flex-col min-h-screen bg-gray-50">
    
    <?php
    $pageTitle = 'Bienvenue sur <span class="text-blue-400">Alibobo</span>'; 
    include __DIR__ . '/partials/header.php';
    ?>

    <main class="flex-grow">
        <section class="relative bg-gradient-to-r from-blue-500 to-green-500 text-white p-10 mb-8">
            <div class="container mx-auto text-center">
                <h2 class="text-4xl font-bold mb-4">Découvrez nos produits</h2>
                <p class="text-lg">des articles pour tt out le monde</p>
                <a href="./produits" class="inline-block mt-6 bg-white text-blue-500 px-6 py-3 rounded-full font-bold shadow-md hover:bg-gray-100 transition-transform transform hover:scale-105">
                    Explorer les produits
                </a>
            </div>
        </section>
        
        <section class="container mx-auto relative mb-12">
            <div class="overflow-hidden w-full h-64 md:h-96 rounded-lg shadow-2xl">
                <div class="carousel flex transition-transform duration-500">
                    <div class="w-full flex-shrink-0">
                        <img src="https://via.placeholder.com/1200x400/FF5733/FFFFFF?text=Image+1" alt="Image 1" class="w-full h-full object-cover">
                    </div>
                    <div class="w-full flex-shrink-0">
                        <img src="https://via.placeholder.com/1200x400/33C4FF/FFFFFF?text=Image+2" alt="Image 2" class="w-full h-full object-cover">
                    </div>
                    <div class="w-full flex-shrink-0">
                        <img src="https://via.placeholder.com/1200x400/28A745/FFFFFF?text=Image+3" alt="Image 3" class="w-full h-full object-cover">
                    </div>
                    <div class="w-full flex-shrink-0">
                        <img src="https://via.placeholder.com/1200x400/FF5733/FFFFFF?text=Image+1" alt="Image 1 Clone" class="w-full h-full object-cover">
                    </div>
                </div>
            </div>
            <button class="absolute top-1/2 left-0 transform -translate-y-1/2 bg-gray-800 bg-opacity-75 text-white px-4 py-2 rounded-full shadow-md hover:bg-gray-900 transition-transform hover:scale-110" onclick="prevSlide()">&#10094;</button>
            <button class="absolute top-1/2 right-0 transform -translate-y-1/2 bg-gray-800 bg-opacity-75 text-white px-4 py-2 rounded-full shadow-md hover:bg-gray-900 transition-transform hover:scale-110" onclick="nextSlide()">&#10095;</button>
        </section>
        
        <?php include __DIR__ . '/partials/footer.php'; ?>
       

        <script>
            let currentIndex = 0;
            const slides = document.querySelector('.carousel');
            const totalSlides = slides.children.length; 
            const slideWidth = 100;
        
            function showSlide(index) {
                slides.style.transition = 'transform 0.5s ease';
                slides.style.transform = `translateX(-${index * slideWidth}%)`;
            }
        
            function nextSlide() {
                currentIndex++;
                showSlide(currentIndex);
        
                
                if (currentIndex === totalSlides - 1) {
                    setTimeout(() => {
                        slides.style.transition = 'none'; 
                        currentIndex = 0; 
                        slides.style.transform = `translateX(-${currentIndex * slideWidth}%)`;
                    }, 500); 
                }
            }
        
            function prevSlide() {
                currentIndex--;
                if (currentIndex < 0) {
                    slides.style.transition = 'none'; 
                    currentIndex = totalSlides - 2; 
                    slides.style.transform = `translateX(-${currentIndex * slideWidth}%)`;
                }
                setTimeout(() => {
                    slides.style.transition = 'transform 0.5s ease'; 
                    showSlide(currentIndex);
                }, 0);
            }
        
            setInterval(() => {
                nextSlide();
            }, 3000);
        </script>
        
</body>
</html>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>wahid's research lab</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <!-- Add icon library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    .justified {
        text-align: justify;
    }
</style>

</head>

<body class="index-page" data-bs-spy="scroll" data-bs-target="#navmenu">
  <!--1st header start-->
  @include('frontend.layout.header')
  <!-- 1st header End Header -->
  <!--2nd header start-->
  @include('frontend.layout.section')
  <!--2nd navbar end-->

  <main>

    <!-- About carousel - Home Page -->
   @include('frontend.layout.carousel')
    <!-- End carousel Section -->

    <!-- End carousel Section -->
    <section>
        <div class="container-fluid">
          <div class="row mt-0">
            <div class="col">
              <h1 class="text-start mx-5">AI research lab</h1>
              <p class="justified mx-5">
                An AI research lab, or Artificial Intelligence research laboratory, is a facility dedicated to the study, development, and advancement of artificial intelligence technologies. These labs typically consist of interdisciplinary teams comprising computer scientists, engineers, mathematicians, cognitive scientists, and other experts collaborating to push the boundaries of AI.
                <ol class="mx-5">
                  <li class="justified">Researchers: The core of the lab is composed of researchers with diverse backgrounds and expertise in AI. They work on various aspects of AI, including machine learning, natural language processing, computer vision, robotics, and more.</li>
                  <li class="justified">Projects: AI labs undertake numerous projects spanning different domains and applications. These projects could range from fundamental research aimed at advancing AI algorithms and theories to applied research targeting real-world problems such as healthcare, finance, autonomous vehicles, and cybersecurity.</li>
                  <li class="justified">Computational Resources: Given the computational demands of AI research, these labs are equipped with high-performance computing resources, including powerful servers, clusters, and GPUs/TPUs for training complex models and running simulations.</li>
                  <li class="justified">Data Infrastructure: Data is crucial for training AI models. AI labs often maintain large-scale data repositories or have access to datasets for various purposes, including model training, testing, and validation.</li>
                  <li class="justified">Collaborations: AI research labs often collaborate with other research institutions, universities, industry partners, and governmental agencies. Collaborations facilitate knowledge exchange, resource sharing, and access to diverse perspectives and expertise.</li>
                  <li class="justified">Publications and Conferences: Researchers in AI labs publish their findings in peer-reviewed journals and present their work at conferences, contributing to the collective knowledge in the field. These publications showcase the lab's contributions to advancing AI technologies.</li>
                  <li class="justified">Educational Initiatives: Many AI labs engage in educational initiatives such as hosting workshops, seminars, and summer schools to train the next generation of AI researchers and practitioners. They may also offer internships and research opportunities for students and early-career professionals.</li>
                  <li class="justified">Ethical Considerations: With the increasing impact of AI on society, AI research labs often address ethical implications associated with AI technologies. They may have dedicated teams or committees focused on ensuring that AI applications are developed and deployed responsibly and ethically.</li>
                </ol>
              </p>
            </div>
          </div>

          <div class="row mt-4">
            <div class="col">
              <h1 class="text-start mx-5">Current funded research projects</h1>
              <ul class="mx-5">
                <li>Vehicle Performance, Reliability & Operations (VePro)- Analysis to Reduce Costs & Extend Life</li>
                <li>Cybersecurity Education Hub-An MSU-MCA Collaborative Project</li>
                <li>GenCyber: Mississippi State University Student Camp</li>
                <li>Develop ML/AI models to estimate the health status of individual system</li>
                <li>Automated Low-Cost Distributed Acoustics Sensing for Perimeter Intrusion Detections using Fiber Bragg Gratings</li>
                <li>Systems Engineering Analytics</li>
              </ul>
            </div>
          </div>

          <div class="row mt-4">
            <div class="col">
              <h1 class="text-start mx-5">Research projects pending to be funded</h1>
              <ul class="mx-5">
                <li>Enhanced Network Cybersecurity Research: Self-Organizing Maps for Intrusion Detection </li>
                <li>A Hybrid Model-Based Approach to Self-Defense of Health Information Systems</li>
                <li>Large Scale Simulation of Fluid Flow through Porous Media with Quantum Computing</li>
              </ul>
            </div>
          </div>

        </div>
      </section>

  </main>
  <!-- ======= Footer ======= -->
    @include('frontend.layout.footer')
  <!-- End Footer -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>

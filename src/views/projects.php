<?php $title = "Mes Projets"; ?>

<?php ob_start(); ?>

<p>Cette page présente certains de mes projets, regroupés par catégories.</p>
<div class="container">
    <div class="toc js-toc">
        <!--<p>Catégories</p>!-->

        <ul class="js-toc-list">
            <?php foreach ($projectsByCategory as $categoryName => $categoryProjects): ?>
        
            <li>
                <a href="#<?= preg_replace('/[^\p{L}\p{N}]+/u', '-',preg_replace('/\s+/', '-', strtolower($categoryName))) ?>"><?= htmlspecialchars($categoryName) ?></a>
                <ul>
                    <?php foreach ($categoryProjects as $project): ?>
                        <li>
                            <a href="#<?= $project->titleLink ?>"><?= $project->title ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </li>
            <?php endforeach; ?>
            
        </ul>
    </div>

    <div>

        <?php foreach ($projectsByCategory as $categoryName => $categoryProjects): ?>
        
        <h2 id="<?= preg_replace('/[^\p{L}\p{N}]+/u', '-',preg_replace('/\s+/', '-', strtolower($categoryName)))?>"><?= htmlspecialchars($categoryName) ?></h2>
        
        <div class="category-projects-container">
            <?php foreach ($categoryProjects as $project): ?>
                
                <article class="main-box">
                    <h3 id="<?= $project->titleLink; ?>"><?= $project->title ?></h3>
                    <p><span class="fas fa-calendar-alt"></span> <?= htmlspecialchars($project->dateProject) ?></p>
                    <p>
                        <img src="<?= BASE_URL ?>contents/projects/<?= $project->imageName ?>" alt="">
                        <?= nl2br($project->content); ?>
                    </p>
                    </article>
                
            <?php endforeach; ?>
        </div>

    <?php endforeach; ?>
        
    
    </div>
            </div>

<script>
function ready(fn) {
  document.addEventListener('DOMContentLoaded', fn, false)
}

ready(() => {
  const motionQuery = window.matchMedia('(prefers-reduced-motion)')

  const TableOfContents = {
    container: document.querySelector('.js-toc'),
    links: null,
    headings: null,
    intersectionOptions: {
      rootMargin: '0px',
      threshold: 1
    },
    previousSection: null,
    observer: null,

    init() {
      this.handleObserver = this.handleObserver.bind(this)

      this.setUpObserver()
      this.findLinksAndHeadings()
      this.observeSections()

      this.links.forEach(link => {
        link.addEventListener('click', this.handleLinkClick.bind(this))
      })
    },

    handleLinkClick(evt) {
      
      
      const link = evt.currentTarget;
      const parentLi = link.parentElement;
      const subMenu = parentLi.querySelector('ul');

      if (subMenu) {
        if (window.innerWidth <= 1200) {
          evt.preventDefault();
          if (parentLi.classList.contains('is-open')) {
            parentLi.classList.remove('is-open');
            parentLi.classList.add('not-open');
          }
          else {
            document.querySelectorAll('.js-toc-list > li.is-open').forEach(li => {
              li.classList.remove('is-open');
              li.classList.add('not-open');
            });
            parentLi.classList.add('is-open');
            parentLi.classList.remove('not-open');
          }
        }
        return; 
      }
    
      let id = link.getAttribute('href').replace('#', '');

      let section = this.headings.find(heading => {
        return heading && heading.getAttribute('id') === id;
      });

      if (section) {
        section.setAttribute('tabindex', -1);
        section.focus();

        window.scroll({
          behavior: motionQuery.matches ? 'instant' : 'smooth',
          top: section.offsetTop - 15,
          block: 'start'
        });
      }

      if (this.container.classList.contains('is-active')) {
        this.container.classList.remove('is-active');
      }
    },

    handleObserver(entries, observer) {
      entries.forEach(entry => {
        let href = `#${entry.target.getAttribute('id')}`,
            link = this.links.find(l => l.getAttribute('href') === href)

        if (link) {
            if (entry.isIntersecting && entry.intersectionRatio >= 1) {
              link.classList.add('is-visible')
              this.previousSection = entry.target.getAttribute('id')
            } else {
              link.classList.remove('is-visible')
            }
        }

        this.highlightFirstActive()
      })
    },

    highlightFirstActive() {
      let firstVisibleLink = this.container.querySelector('.is-visible')

      this.links.forEach(link => {
        link.classList.remove('is-active')
      })

      if (firstVisibleLink) {
        firstVisibleLink.classList.add('is-active')
      }

      if (!firstVisibleLink && this.previousSection) {
        const previousLink = this.container.querySelector(`a[href="#${this.previousSection}"]`);
        if (previousLink) {
            previousLink.classList.add('is-active');
        }
      }
    },

    observeSections() {
      this.headings.forEach(heading => {
        if (heading) {
            this.observer.observe(heading)
        }
      })
    },

    setUpObserver() {
      this.observer = new IntersectionObserver(
        this.handleObserver,
        this.intersectionOptions
      )
    },

    findLinksAndHeadings() {
      this.links = [...this.container.querySelectorAll('a')]
      this.headings = this.links.map(link => {
        let id = link.getAttribute('href')
        return document.querySelector(id)
      }).filter(heading => heading !== null) 
    }
  }

  TableOfContents.init()
});
</script>


<?php if (isset($errorMessage)) {
    echo $errorMessage;
} ?>
<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>

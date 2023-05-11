const contributorsList = document.getElementById('contributors-list');

// Fetch the GitHub contributors list
fetch('https://api.github.com/repos/tewedaj/phexpress/contributors')
  .then(response => response.json())
  .then(contributors => {
    contributors.forEach(contributor => {
      const contributorElement = createContributorElement(contributor);
      contributorsList.appendChild(contributorElement);
    });
  })
  .catch(error => {
    console.error('Error fetching contributors:', error);
  });

// Create contributor element
function createContributorElement(contributor) {
  const contributorElement = document.createElement('div');
  contributorElement.className = 'contributor';

  const avatarElement = document.createElement('img');
  avatarElement.className = 'avatar';
  avatarElement.src = contributor.avatar_url;
  contributorElement.appendChild(avatarElement);

  const usernameElement = document.createElement('span');
  usernameElement.className = 'username';
  usernameElement.textContent = contributor.login;
  contributorElement.appendChild(usernameElement);

  const contributionsElement = document.createElement('span');
  contributionsElement.className = 'contributions';
  contributionsElement.textContent = `${contributor.contributions} contributions`;
  contributorElement.appendChild(contributionsElement);

  return contributorElement;
}

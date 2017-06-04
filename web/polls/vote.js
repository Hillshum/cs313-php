$(()=>{
  $('.poll-responses').on('click', 'button', (e)=>{
    const pollId = $(e.delegateTarget).data('poll');
    const responseId = $(e.currentTarget).data('response');

    fetch('vote.php', {
      method: "POST",
      body: JSON.stringify({
        poll_id: pollId,
        response_id: responseId
      })
    }).then(res=> {
      if (res.status === 200) {
        return res.json()
      } else throw res
    }).then(results=> {
      const rowContainer = document.querySelector('.poll-data')
      $(rowContainer).empty()
      results.forEach(r=>{
        const template = document.querySelector('#results-template')
        template.content.querySelector('.name').textContent= r.name
        template.content.querySelector('.results').textContent= r.responses

        let row = document.importNode(template.content, true)
        rowContainer.appendChild(row)
        
      })
      console.log(results)
    })
  })
})
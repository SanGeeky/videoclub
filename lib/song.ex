defmodule Song do
  @members [:taeyong, :doyoung, :mark, :lucas]
  @sentences %{
    taeyong: [
      """
      I realize the outside world is different from what I imagined
      My devastated soul and my broken mind
      Somehow you'd always try to drag those bad days away from me
      I wondered, how can you be so strong? Uh\
      """,
      """
      I'll throw away yesterday's you and me
      And I'm going to make who I'll be today
      Don't killing my vibe 'cause this is me\
      """
    ],
    doyoung: [
      """
      Broken heart, oh, even if it hurts
      That's a story I can't go back to
      This short dream oh, your memories
      Even today they seem to be unforgettable
      If everything is tomorrow then yesterday\
      """,
      """
      Broken heart, oh, even if I try to erase it
      It's a story that was deeply engraved in my heart
      This short dream oh, the past memories
      Even today those times seem to be unforgettable\
      """,
      """
      Sorry that I walked away,
      if tomorrow is yesterday,
      the precious yesterday\
      """
    ],
    mark: [
      """
      Boy didn't know a lot, I think I'm still the same
      I am still exploring my own galaxy, I still don't know my own screen\
      """,
      """
      For the future traded yesterday, still I
      If memories made me, then with time I'll make today
      I hope you like it where I'm now\
      """
    ],
    lucas: [
      """
      Do you think about me too?
      Do you always cry? When it rains, when the pains come in shame
      When the fame is a jade and I'm born to be made
      But the cost of the fade I've got quickly to shade
      Ever quickly to hate, burning like a serenade
      Burning like my hurricanes, when you said it was wrong
      Even if there is a right
      Now I can only dream about you holding me tight
      Can you hold me tight?\
      """
    ]
  }
  @default_phrases ["Dream on and Go on", "Emphaty <3"]

  def phrase do
    # Reference to NCT 127
    default_phrase = Enum.random(1..27)

    random_phrase(default_phrase)
  end

  defp random_phrase(magic_number) when magic_number == 27 do
    sentence = Enum.random(@default_phrases)

    "« #{sentence} »"
  end

  defp random_phrase(_magic_number) do
    member = Enum.random(@members)

    sentence =
      Map.get(@sentences, member)
      |> Enum.random()
      |> String.replace("\n", "\n\t\s")

    """
      «#{sentence}»

      [#{Atom.to_string(member) |> String.capitalize()} ^^]
    """
  end
end

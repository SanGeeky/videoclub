defmodule Yestoday do
  alias Song

  def for_u do
    """
      This is for u...
      #{Song.phrase()}
    """
  end
end
